/**
 * Задача:
 * Если фрахт не FESCO, допустим NLA или любой агент, то из терминала выгрузки ЖД ВМПТ для всех будет SOC ставки ЖД.
 * Если фрахт FESCO, то ЖД из ВМТП терминала выгрузки будет COC всегда для агента FESCO.
 */

// Обработчик клика по строке
function handleSeaRowClick(event) {
    const row = event.target.closest('tr');

    if (row) {
        const checkbox = row.querySelector('input[type="checkbox"]');

        if (checkbox && checkbox.checked) {
            const contractor = row.cells.item(1).textContent.trim().toLowerCase();
            const terminal = row.cells.item(4).textContent.trim().toLowerCase();

            // Проверяем условия для терминала ВМПТ
            if (terminal === 'вмтп') {
                if (contractor === 'fesco') {
                    changeRailForm('containerOwner', 'coc');
                } else {
                    changeRailForm('containerOwner', 'soc');
                }
            }
        }
    }
}

/**
 * Функция изменения значения select в форме rail-form
 * @param {string} selector - имя select поля
 * @param {string} value - значение, которое нужно установить
 */
function changeRailForm(selector, value) {
    const railForm = document.getElementById('rail-form');

    if (!railForm) {
        console.error('Rail form not found');
        return;
    }

    const selectorElement = railForm.querySelector(`select[name="${selector}"]`);

    if (selectorElement) {
        // Установить значение select, если оно отличается от текущего
        if (selectorElement.value !== value) {
            selectorElement.value = value;

            // Триггерим событие change для обновления фильтров или таблиц
            const event = new Event('change', {bubbles: true});
            selectorElement.dispatchEvent(event);
        }
    } else {
        console.error(`Selector "${selector}" not found in rail form`);
    }
}

// Инициализация обработчика кликов
document.addEventListener('DOMContentLoaded', function () {
    const seaResultsTable = document.getElementById('sea-results');

    if (seaResultsTable) {
        const seaTableBody = seaResultsTable.querySelector('tbody');
        seaTableBody.addEventListener('click', function (event) {
            handleSeaRowClick(event);
        });
    }
});