import {autoSelectRow} from "../conditions/autoSelectRow.js";

// Функция для проверки выбранной строки в таблице с id sea-results
export function checkSeaResultsSelection() {
    const seaResultsTable = document.getElementById('sea-results');

    if (seaResultsTable) {
        const tbody = seaResultsTable.querySelector('tbody');

        tbody.addEventListener('click', function (event) {
            const row = event.target.closest('tr');
            if (row) {
                const checkbox = row.querySelector('input[type="checkbox"]');

                if (checkbox && checkbox.checked) {
                    // Установить выбранное значение для других блоков
                    autoSelectRow('sea-results', row);
                }
            }
        });
    }
}
