import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

// Обработчик изменения значения в формах
export function handleContainerTypeChange() {
    const seaContainerType = document.querySelector('#sea-form select[name="containerType"]');
    const railContainerType = document.querySelector('#rail-form select[name="containerType"]');
    const boxContainerType = document.querySelector('#container-form select[name="containerType"]');

    if (!seaContainerType || !railContainerType || !boxContainerType) return;
    // 40HC
    if (seaContainerType.value === '40hc') {
        // ЖД
        if (railContainerType.value !== '40hc') {
            railContainerType.value = '40hc';
            updateResults('rail-form');
        }
        railContainerType.disabled = true;

        // Аренда
        if (boxContainerType.value !== '40hc') {
            boxContainerType.value = '40hc';
            updateResults('container-form');
        }
        boxContainerType.disabled = true;

        // 20DRY
    } else {
        // ЖД
        if (railContainerType.value === '40hc') {
            railContainerType.value = '20dry (<24т)';
        }

        // Блокируем выбор 40hc
        const optionToDisable = document.querySelector('#rail-form option[value="40hc"]');
        optionToDisable.disabled = true;

        railContainerType.disabled = false; // Разблокируем изменение

        // Аренда
        if (boxContainerType.value !== '20dry') {
            boxContainerType.value = '20dry';
            updateResults('container-form');
        }
        boxContainerType.disabled = true;
    }
}

// Функция для обновления списка
function updateResults(formId) {
    const formData = new FormData(document.querySelector(`#${formId}`));
    const data = {
        formId: formId,
        fields: Object.fromEntries(formData.entries())
    };

    console.log('updateResults', data);

    const formAction = '/local/modules/logistic.tarifficator/api/list/get';
    sendAjaxRequest(formAction, 'POST', data, function (response) {
        updateTable(response, formId);
    });
}

// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    const seaContainerType = document.querySelector('#sea-form select[name="containerType"]');

    if (seaContainerType) {
        seaContainerType.addEventListener('change', handleContainerTypeChange);
    }

    // Инициализация обрабочика изменений
    handleContainerTypeChange();
});