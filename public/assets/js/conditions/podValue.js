// Обработчик изменения значения в формах
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

export function handlePodValueChange() {
    const seaPodValue = document.querySelector('#sea-form select[name="pod"]');
    const railPodValue = document.querySelector('#rail-form select[name="departureStation"]');

    if (!seaPodValue || !railPodValue) return;

    const selectedSeaValue = seaPodValue.value;

    // Существует ли значение seaPodValue в railPodValue
    const optionExists = Array.from(railPodValue.options).some(option => option.value === selectedSeaValue);

    if (optionExists) {
        railPodValue.value = selectedSeaValue;
        updateResults('rail-form');
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
    const seaPodValue = document.querySelector('#sea-form select[name="pod"]');

    if (seaPodValue) {
        seaPodValue.addEventListener('change', handlePodValueChange);
    }

    // Инициализация обработчика изменений
    handlePodValueChange();
});