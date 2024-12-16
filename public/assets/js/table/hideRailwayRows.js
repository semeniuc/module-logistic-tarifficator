// Обработчик клика по строке
function handleRailRowClick(row, railResultsTable) {
    if (!row) return;

    const checkbox = row.querySelector('input[type="checkbox"]');
    const route = row.cells.item(2).textContent.trim().toLowerCase();

    if (checkbox && checkbox.checked) {
        if (row.classList.contains('is-with-service')) {
            updateRailResultsTable(railResultsTable, route);
        } else {
            showAllRailRows(railResultsTable);
        }
    } else {
        showAllRailRows(railResultsTable);
    }
}

// Функция обновления railResultsTable
function updateRailResultsTable(railResultsTable, route) {
    const tbody = railResultsTable.querySelector('tbody');

    // Скрываем все строки, не соответствующие маршруту
    const rows = tbody.querySelectorAll('tr');
    let hasVisibleRows = false;

    rows.forEach(row => {
        const contractor = row.cells.item(1).textContent.trim().toLowerCase();
        if (contractor === route && !row.classList.contains('table-row-not-found')) {
            row.classList.replace('hide', 'show');
            row.style.display = 'table-row';
            hasVisibleRows = true; // Строка видимая, устанавливаем флаг в true
        } else {
            row.classList.replace('show', 'hide');
            row.style.display = 'none';
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
        if (row.style.display !== 'none') {
            hasVisibleRows = true; // Если хотя бы одна строка видимая, устанавливаем флаг
        }
    });

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
        seaTableBody.addEventListener('click', function (event) {
            const row = event.target.closest('tr');
            if (row) {
                handleRailRowClick(row, railResultsTable);
            }
        });

        const railForm = document.getElementById('rail-form');
        railForm.addEventListener('change', function () {
            const selectedRow = seaResultsTable.querySelector('.table-row-selected');
            if (selectedRow) {
                // handleRailRowClick(selectedRow, railResultsTable);
            }
        });
    }
});
