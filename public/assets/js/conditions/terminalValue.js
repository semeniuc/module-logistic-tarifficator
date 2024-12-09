// Обработчик изменения значения в формах
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

export function handleTerminalChange() {
    const seaTerminal = document.querySelector('#sea-form select[name="terminal"]');
    const railTerminal = document.querySelector('#rail-form select[name="terminal"]');

    if (!seaTerminal || !railTerminal) return;

    const selectedSeaValue = seaTerminal.value;

    // Существует ли значение seaTerminal в railTerminal
    const optionExists = Array.from(railTerminal.options).some(option => option.value === selectedSeaValue);

    if (optionExists) {
        railTerminal.value = selectedSeaValue;
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
    const seaTerminal = document.querySelector('#sea-form select[name="terminal"]');

    if (seaTerminal) {
        seaTerminal.addEventListener('change', handleTerminalChange);
    }

    // Инициализация обработчика изменений
    handleTerminalChange();
});