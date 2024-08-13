// Обработчик изменения значения в sea-form
function handleSeaContainerChange() {
    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');
    const railContainerOwner = document.querySelector('#rail-form select[name="containerOwner"]');

    if (!seaContainerOwner || !railContainerOwner) return;

    const isSocSelected = seaContainerOwner.value === 'soc';

    if (isSocSelected) {
        if (railContainerOwner.value !== 'soc') {
            railContainerOwner.value = 'soc';
            updateRailResults();
        }
        railContainerOwner.disabled = true; // Блокируем изменение
    } else {
        railContainerOwner.disabled = false; // Разблокируем изменение
    }

    updateContainerName();
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

    if (seaContainerOwner) {
        seaContainerOwner.addEventListener('change', handleSeaContainerChange);
    }

    if (railContainerOwner) {
        railContainerOwner.addEventListener('change', updateRailResults);
    }

    // Инициализация обрабочика изменений
    handleSeaContainerChange();
});