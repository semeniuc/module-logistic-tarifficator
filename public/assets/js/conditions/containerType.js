// Обработчик изменения значения в sea-form
function handleContainerTypeChange() {
    const seaContainerType = document.querySelector('#sea-form select[name="containerType"]');
    const railContainerType = document.querySelector('#rail-form select[name="containerType"]');
    const boxContainerType = document.querySelector('#container-form select[name="containerType"]');

    if (!seaContainerType || !railContainerType || !boxContainerType) return;
    // 40HC
    if (seaContainerType.value === '40hc') {
        // ЖД
        if (railContainerType.value !== '40hc') {
            railContainerType.value = '40hc';
            updateRailResults();
        }
        railContainerType.disabled = true;

        // Аренда
        if (boxContainerType.value !== '40hc') {
            boxContainerType.value = '40hc';
            updateContainerResults();
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
            updateContainerResults();
        }
        boxContainerType.disabled = true;
    }

}

// Функция для обновления списка rail-results
function updateRailResults() {
    const formData = new FormData(document.querySelector('#rail-form'));
    const data = {
        formId: 'rail-form',
        fields: Object.fromEntries(formData.entries())
    };

    // Отправляем запрос для обновления списка
    const formAction = '/local/modules/logistic.tarifficator/api/list/get';
    sendAjaxRequest(formAction, 'POST', data, function (response) {
        updateTable(response, 'rail-form'); // Обновляем таблицу с новыми данными
    });
}

// Функция для обновления списка container-results
function updateContainerResults() {
    const formData = new FormData(document.querySelector('#container-form'));
    const data = {
        formId: 'container-form',
        fields: Object.fromEntries(formData.entries())
    };

    // Отправляем запрос для обновления списка
    const formAction = '/local/modules/logistic.tarifficator/api/list/get';
    sendAjaxRequest(formAction, 'POST', data, function (response) {
        updateTable(response, 'container-form'); // Обновляем таблицу с новыми данными
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