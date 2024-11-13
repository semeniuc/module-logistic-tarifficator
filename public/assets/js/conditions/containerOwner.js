// Обработчик изменения значения в sea-form
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

export function handleSeaContainerChange() {
    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');
    const railContainerOwner = document.querySelector('#rail-form select[name="containerOwner"]');
    const autoContainerOwner = document.querySelector('#auto-form select[name="containerOwner"]');
    const dropOffOwner = document.querySelector('#container-form select[name="containerOwner"]');

    if (!seaContainerOwner) return;

    // Rail
    if (railContainerOwner) {
        if (railContainerOwner.value !== seaContainerOwner.value) {
            railContainerOwner.value = seaContainerOwner.value;
            updateListResults('rail-form');
        }
    }

    // Auto
    if (autoContainerOwner) {
        if (autoContainerOwner.value !== seaContainerOwner.value) {
            autoContainerOwner.value = seaContainerOwner.value;
            updateListResults('auto-form');
        }
    }

    // Drop off
    if (dropOffOwner) {
        if (dropOffOwner.value !== seaContainerOwner.value) {
            dropOffOwner.value = seaContainerOwner.value;
            updateListResults('container-form');
        }
    }

    updateContainerName();
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

// Обновление заголовков для container-form и container-results
function updateContainerName() {
    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');
    const selectedValue = seaContainerOwner ? seaContainerOwner.value : '';

    const elements = document.querySelectorAll('.container-dynamic-name');
    elements.forEach(element => {
        element.textContent = selectedValue === 'soc' ? 'Аренда контейнера' : 'Drop off';
    });
}

// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {

    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');
    const railContainerOwner = document.querySelector('#rail-form select[name="containerOwner"]');
    const autoContainerOwner = document.querySelector('#auto-form select[name="containerOwner"]');

    if (seaContainerOwner) {
        seaContainerOwner.addEventListener('change', handleSeaContainerChange);
    }

    if (railContainerOwner) {
        railContainerOwner.addEventListener('change', function () {
            updateListResults('rail-form');
        });
    }

    if (autoContainerOwner) {
        autoContainerOwner.addEventListener('change', function () {
            updateListResults('auto-form');
        });
    }

    // Инициализация обрабочика изменений
    handleSeaContainerChange();
});