// Импорт необходимых функций
import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

// Универсальная функция обработки изменений
function handleFormChange(sourceSelector, targetSelector, formId) {
    const sourceElement = document.querySelector(sourceSelector);
    const targetElement = document.querySelector(targetSelector);

    if (!sourceElement || !targetElement) return;

    const selectedValue = sourceElement.value;

    // Специальная логика для containerType
    if (sourceSelector.includes('containerType')) {
        let targetValue = '';

        if (selectedValue === '40hc') {
            targetValue = targetSelector.includes('auto-form') ? '40hc (<20т)' : '40hc';
        } else if (selectedValue === '20dry') {
            targetValue = targetSelector.includes('auto-form') ? '20dry (<18т)' : targetSelector.includes('rail-form') ? '20dry (<24т)' : '20dry';
        }

        if (targetElement.value !== targetValue) {
            targetElement.value = targetValue;
            updateResults(formId);
        }
        return; // Завершаем выполнение, так как обработка containerType завершена
    }

    // Универсальная обработка
    const optionExists = Array.from(targetElement.options).some(option => option.value === selectedValue);

    if (optionExists) {
        if (targetElement.value !== selectedValue) {
            targetElement.value = selectedValue;
            updateResults(formId);
        }
    } else {
        targetElement.value = ''; // Сбрасываем значение, если его нет в списке
    }
}

// Универсальная функция обновления списка
function updateResults(formId) {
    const formElement = document.querySelector(`#${formId}`);
    if (!formElement) return;

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

// Настройка обработчиков событий
document.addEventListener('DOMContentLoaded', function () {
    // Обработка событий при изменении значения
    const seaDestination = document.querySelector('#sea-form select[name="destination"]');
    if (seaDestination) {
        seaDestination.addEventListener('change', () => {
            handleFormChange('#sea-form select[name="destination"]', '#rail-form select[name="destination"]', 'rail-form');
            handleFormChange('#sea-form select[name="destination"]', '#container-form select[name="destination"]', 'container-form');
            handleFormChange('#sea-form select[name="destination"]', '#auto-form select[name="destination"]', 'auto-form');
        });
    }

    const seaTerminal = document.querySelector('#sea-form select[name="terminal"]');
    if (seaTerminal) {
        seaTerminal.addEventListener('change', () => {
            handleFormChange('#sea-form select[name="terminal"]', '#rail-form select[name="terminal"]', 'rail-form');
            handleFormChange('#sea-form select[name="terminal"]', '#auto-form select[name="terminal"]', 'auto-form');
        });
    }

    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');
    if (seaContainerOwner) {
        seaContainerOwner.addEventListener('change', () => {
            handleFormChange('#sea-form select[name="containerOwner"]', '#rail-form select[name="containerOwner"]', 'rail-form');
            handleFormChange('#sea-form select[name="containerOwner"]', '#container-form select[name="containerOwner"]', 'container-form');
            handleFormChange('#sea-form select[name="containerOwner"]', '#auto-form select[name="containerOwner"]', 'auto-form');
        });
    }

    const seaContainerType = document.querySelector('#sea-form select[name="containerType"]');
    if (seaContainerType) {
        seaContainerType.addEventListener('change', () => {
            handleFormChange('#sea-form select[name="containerType"]', '#rail-form select[name="containerType"]', 'rail-form');
            handleFormChange('#sea-form select[name="containerType"]', '#container-form select[name="containerType"]', 'container-form');
            handleFormChange('#sea-form select[name="containerType"]', '#auto-form select[name="containerType"]', 'auto-form');
        });
    }
});
