/*
 * Файл не используется! Ошибка в поведении.
 * @deprecated
 */

// Обработчик клика по строке
function handleRailRowClick(railResultsTable) {
    const selectedRow = document.querySelector('#sea-results .table-row-selected');

    if (selectedRow) {
        const route = selectedRow.cells.item(2).textContent.trim().toLowerCase();
        updateRailResultsTable(railResultsTable, route);
    } else {
        showAllRailRows(railResultsTable);
    }
}

// Функция обновления railResultsTable
function updateRailResultsTable(railResultsTable, route) {
    const tbody = railResultsTable.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    let hasVisibleRows = false;

    rows.forEach(row => {
        if (row.cells.length > 1) {
            const contractor = row.cells.item(1).textContent.trim().toLowerCase();

            if (contractor === route) {
                row.classList.replace('hide', 'show');
                row.style.display = 'table-row';
                hasVisibleRows = true;

                console.log('railRow', contractor, route, row);
            } else {
                row.classList.replace('show', 'hide');
                row.style.display = 'none';
            }
        }
    });


    console.log('hasVisibleRows', hasVisibleRows);

    // Если нет видимых строк, показываем сообщение "Нет данных"
    if (!hasVisibleRows) {
        addNoDataRow(tbody, 'Нет данных для выбранного маршрута');
    } else {
        removeNoDataRow(tbody);
    }
}

// Функция отображения всех строк в railResultsTable
function showAllRailRows(railResultsTable) {
    const tbody = railResultsTable.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    let hasVisibleRows = false;

    // Показываем все строки
    rows.forEach(row => {
        row.classList.replace('hide', 'show');
        row.style.display = 'table-row';
        hasVisibleRows = true;
    });

    console.log('showAllRailRows - hasVisibleRows', hasVisibleRows);

    // Если нет видимых строк, показываем сообщение "Нет данных"
    if (!hasVisibleRows) {
        addNoDataRow(tbody, 'Нет данных для выбранного маршрута');
    } else {
        removeNoDataRow(tbody);
    }
}

// Функция добавления строки "Нет данных"
function addNoDataRow(tbody, message) {
    let noDataRow = tbody.querySelector('.table-row-not-found');
    if (!noDataRow) {
        noDataRow = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = message;
        td.colSpan = tbody.closest('table').querySelectorAll('th').length;
        td.style.textAlign = 'center';
        noDataRow.appendChild(td);
        noDataRow.classList.add('table-row-not-found', 'hide');
        tbody.appendChild(noDataRow);
    }

    // Показываем строку с сообщением
    setTimeout(() => {
        noDataRow.classList.replace('hide', 'show');
        noDataRow.style.display = 'table-row';
    }, 100);
}

// Функция удаления строки "Нет данных"
function removeNoDataRow(tbody) {
    const noDataRow = tbody.querySelector('.table-row-not-found');
    if (noDataRow) {
        noDataRow.remove();
    }
}

// Инициализация обработчиков событий
document.addEventListener('DOMContentLoaded', function () {
    const seaResultsTable = document.getElementById('sea-results');
    const railResultsTable = document.getElementById('rail-results');

    if (seaResultsTable && railResultsTable) {
        const seaTableBody = seaResultsTable.querySelector('tbody');
        seaTableBody.addEventListener('click', function () {
            handleRailRowClick(railResultsTable);
        });

        const railForm = document.getElementById('rail-form');
        railForm.addEventListener('change', function () {
            handleRailRowClick(railResultsTable);
        });
    }
});
