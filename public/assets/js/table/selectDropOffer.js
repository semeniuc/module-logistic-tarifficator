// Обработчик автоматического выбора строки
function autoSelectRow(table, selected) {

    if (table === 'sea-results' && selected) {
        const seaContractor = selected.cells[1]?.innerText.trim().toLowerCase();
        const seaRoute = selected.cells[2]?.innerText.trim().toLowerCase();
        const seaPortDestination = selected.cells[3]?.innerText.trim().toLowerCase();
        const seaDestination = selected.cells[5]?.innerText.trim().toLowerCase();
        const seaType = selected.cells[6]?.innerText.trim().toLowerCase();

        if (seaType === 'coc' && seaContractor && seaDestination) {
            const containerResultsTable = document.getElementById('container-results');

            if (containerResultsTable) {
                const rows = containerResultsTable.querySelectorAll('tbody tr');

                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const dropContractor = row.cells[2]?.innerText.trim().toLowerCase();
                    const dropPortDestination = row.cells[1]?.innerText.trim().toLowerCase();
                    const dropDestination = row.cells[3]?.innerText.trim().toLowerCase();

                    if (
                        dropContractor === seaContractor &&
                        dropPortDestination === seaPortDestination &&
                        dropDestination === seaDestination &&
                        !row.classList.contains('table-row-disabled') &&
                        !row.classList.contains('table-row-selected')
                    ) {
                        row.click();

                        // Переместить выбранную строку наверх таблицы
                        const tbody = containerResultsTable.querySelector('tbody');
                        if (tbody) {
                            tbody.insertBefore(row, tbody.firstChild);
                        }

                        return;
                    }
                }
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const seaResultsTable = document.getElementById('sea-results');

    if (seaResultsTable) {
        const tbody = seaResultsTable.querySelector('tbody');

        tbody.addEventListener('click', function (event) {
            const row = event.target.closest('tr');

            if (row) {
                const checkbox = row.querySelector('input[type="checkbox"]');
                if (checkbox && checkbox.checked) {
                    autoSelectRow('sea-results', row);
                }
            }
        });
    }
});
