// Обработчик изменения значения в формах
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

export function handleContainerTypeChange() {
    const seaContainerType = document.querySelector('#sea-form select[name="containerType"]');
    const railContainerType = document.querySelector('#rail-form select[name="containerType"]');
    const autoContainerType = document.querySelector('#auto-form select[name="containerType"]');
    const boxContainerType = document.querySelector('#container-form select[name="containerType"]');

    if (!seaContainerType) return;

    // 40HC
    if (seaContainerType.value === '40hc') {
        // ЖД
        if (railContainerType.value !== '40hc') {
            railContainerType.value = '40hc';
            updateResults('rail-form');
        }

        // Авто
        if (autoContainerType.value !== '40hc (<20т)') {
            autoContainerType.value = '40hc (<20т)';
            updateResults('auto-form');
        }

        // Аренда
        if (boxContainerType.value !== '40hc') {
            boxContainerType.value = '40hc';
            updateResults('container-form');
        }

        // 20DRY
    } else if (seaContainerType.value === '20dry') {
        // ЖД
        if (railContainerType.value === '40hc') {
            railContainerType.value = '20dry (<24т)';
            updateResults('rail-form');
        }

        // Авто
        if (autoContainerType.value !== '20dry (<18т)') {
            autoContainerType.value = '20dry (<18т)';
            updateResults('auto-form');
        }

        // Аренда
        if (boxContainerType.value !== '20dry') {
            boxContainerType.value = '20dry';
            updateResults('container-form');
        }
    }
}

// Функция для обновления списка
function updateResults(formId) {
    const formElement = document.querySelector(`#${formId}`);
    const formData = new FormData();

    // Обходим все элементы формы, включая отключённые
    const elements = formElement.querySelectorAll('input, select, textarea');
    elements.forEach(element => {
        if (element.name) {
            formData.append(element.name, element.value);
        }
    });

    const data = {
        formId: formId,
        fields: Object.fromEntries(formData.entries())
    };

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