// Обработчик изменения значения в sea-form
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

export function handleDropOffDestinationChange() {
    const seaDestination = document.querySelector('#sea-form select[name="destination"]');
    const railDestination = document.querySelector('#rail-form select[name="destination"]');
    const dropOffDestination = document.querySelector('#container-form select[name="destination"]');

    if (!seaDestination) return;

    // Rail
    if (railDestination && seaDestination) {
        if (railDestination.value !== seaDestination.value && Array.from(railDestination.options).some(option => option.value === seaDestination.value)) {
            railDestination.value = seaDestination.value;
            updateListResults('rail-form');
        } else {
            railDestination.value = '';
        }
    }

    // Drop off
    if (dropOffDestination && seaDestination) {
        if (dropOffDestination.value !== seaDestination.value && Array.from(dropOffDestination.options).some(option => option.value === seaDestination.value)) {
            dropOffDestination.value = seaDestination.value;
            updateListResults('container-form');
        } else {
            dropOffDestination.value = '';
        }
    }
}

// Функция для обновления списка rail-results, auto-results
function updateListResults(name) {
    const formElement = document.querySelector(`#${name}`);
    const formData = new FormData();

    // Обходим все элементы формы, включая отключённые
    const elements = formElement.querySelectorAll('input, select, textarea');
    elements.forEach(element => {
        if (element.name) {
            formData.append(element.name, element.value);
        }
    });

    const data = {
        formId: name,
        fields: Object.fromEntries(formData.entries())
    };

    const formAction = '/local/modules/logistic.tarifficator/api/list/get';
    sendAjaxRequest(formAction, 'POST', data, function (response) {
        updateTable(response, name);
    });
}


// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {

    const seaDestination = document.querySelector('#sea-form select[name="destination"]');
    const dropOffDestination = document.querySelector('#container-form select[name="destination"]');

    if (seaDestination) {
        seaDestination.addEventListener('change', handleDropOffDestinationChange);
    }

    if (dropOffDestination) {
        dropOffDestination.addEventListener('change', function () {
            updateListResults('container-form');
        });
    }

    // Инициализация обрабочика изменений
    handleDropOffDestinationChange();
});