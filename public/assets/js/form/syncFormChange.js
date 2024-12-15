// Универсальная функция обработки изменений
import {updateSelectOptions} from "./updateSelectOptions.js";

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

            return true;
        }
        return; // Завершаем выполнение, так как обработка containerType завершена
    }

    // Универсальная обработка
    const optionExists = Array.from(targetElement.options).some(option => option.value === selectedValue);

    if (optionExists) {
        if (targetElement.value !== selectedValue) {
            targetElement.value = selectedValue;

            return true;
        }
    } else {
        if (targetElement.value !== '') {
            targetElement.value = ''; // Сбрасываем значение, если его нет в списке

            return true;
        }
    }
}

/**
 * Создаёт событие `change` для элемента и кастомное событие `formSyncComplete` для формы.
 * @param {HTMLElement} targetElement - Элемент, для которого нужно создать событие.
 * @returns {Promise<void>} - Промис, который выполняется после синхронизации.
 */
function createEvent(targetElement) {
    if (!(targetElement instanceof HTMLElement)) {
        console.error('Передан некорректный элемент:', targetElement);
        return Promise.reject('Некорректный элемент');
    }

    // Устанавливаем флаг, чтобы предотвратить повторные вызовы
    targetElement.dataset.ignoreChange = "true";

    // Убираем флаг после обработки
    setTimeout(() => delete targetElement.dataset.ignoreChange, 0);

    const form = targetElement.closest('form');
    if (!form) {
        console.warn('Форма для элемента не найдена');
        return Promise.resolve();
    }

    return new Promise(resolve => {
        setTimeout(() => {
            const syncCompleteEvent = new Event('formSyncComplete', {bubbles: true});
            form.dispatchEvent(syncCompleteEvent);
            resolve();
        }, 1000);
    });
}

export function syncFormChange(form) {
    switch (form.id) {
        case 'sea-form': {
            // Destination
            const railDestination = handleFormChange('#sea-form select[name="destination"]', '#rail-form select[name="destination"]', 'rail-form');
            const dropDestination = handleFormChange('#sea-form select[name="destination"]', '#container-form select[name="destination"]', 'container-form');
            const autoDropDestination = handleFormChange('#sea-form select[name="destination"]', '#auto-form select[name="destination"]', 'auto-form');

            // Terminal
            const railTerminal = handleFormChange('#sea-form select[name="terminal"]', '#rail-form select[name="terminal"]', 'rail-form');
            const autoTerminal = handleFormChange('#sea-form select[name="terminal"]', '#auto-form select[name="terminal"]', 'auto-form');

            // ContainerOwner
            const railContainerOwner = handleFormChange('#sea-form select[name="containerOwner"]', '#rail-form select[name="containerOwner"]', 'rail-form');
            const dropContainerOwner = handleFormChange('#sea-form select[name="containerOwner"]', '#container-form select[name="containerOwner"]', 'container-form');
            const autoContainerOwner = handleFormChange('#sea-form select[name="containerOwner"]', '#auto-form select[name="containerOwner"]', 'auto-form');

            // ContainerType
            const railContainerType = handleFormChange('#sea-form select[name="containerType"]', '#rail-form select[name="containerType"]', 'rail-form');
            const dropContainerType = handleFormChange('#sea-form select[name="containerType"]', '#container-form select[name="containerType"]', 'container-form');
            const autoContainerType = handleFormChange('#sea-form select[name="containerType"]', '#auto-form select[name="containerType"]', 'auto-form');


            if (railDestination || railTerminal || railContainerOwner || railContainerType) {
                const targetElement = document.querySelector('#rail-form select[name="containerOwner"]');
                createEvent(targetElement);

                if (railDestination) {
                    updateSelectOptions('rail-form', 'destination', 'station');
                }
            }

            if (dropDestination || dropContainerOwner || dropContainerType) {
                const targetElement = document.querySelector('#container-form select[name="containerOwner"]');
                createEvent(targetElement);
            }

            if (autoDropDestination || autoTerminal || autoContainerOwner || autoContainerType) {
                const targetElement = document.querySelector('#auto-form select[name="containerOwner"]');
                createEvent(targetElement);
            }

            {
                const targetElement = document.querySelector('#sea-form select[name="containerOwner"]');
                createEvent(targetElement);
                updateSelectOptions('sea-form', 'pod', 'terminal');
            }

        }
        case 'rail-form': {
            updateSelectOptions('rail-form', 'destination', 'station');
        }
    }
}

