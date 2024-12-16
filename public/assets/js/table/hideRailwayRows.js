function handleRailRowClick(row, railResultsTable) {
    if (row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        const containerOwner = row.cells.item(6).textContent.trim().toLowerCase();
        const route = row.cells.item(2).textContent.trim().toLowerCase();

        // Если чекбокс выбран
        if (checkbox && checkbox.checked) {
            // Проверяем, есть ли у строки класс 'is-with-service'
            if (row.classList.contains('is-with-service')) {
                // Скрываем все строки в railResultsTable с route, отличным от текущего
                updateRailResultsTable(railResultsTable, route);
            } else {
                // Показываем все строки в railResultsTable
                showAllRailRows(railResultsTable);
            }
        } else {
            // Показываем все строки в railResultsTable, если чекбокс не выбран
            showAllRailRows(railResultsTable);
        }
    }
}

// Функция для скрытия строк в railResultsTable по условию
function updateRailResultsTable(railResultsTable, route) {
    const rows = railResultsTable.querySelectorAll('tbody tr');
    let rowsVisible = false; // Флаг, показывающий есть ли видимые строки

    rows.forEach(row => {
        const contractor = row.cells.item(1).textContent.trim().toLowerCase();

        // Скрываем строки, у которых route отличается от текущего
        if (contractor !== route) {
            row.style.display = 'none';
        } else {
            row.style.display = 'table-row'; // Показываем строку, если route совпадает
            rowsVisible = true;
        }
    });

    // Если нет видимых строк, показываем строку с сообщением "Нет данных"
    toggleNoDataMessage(railResultsTable, rowsVisible);
}

// Функция для показа всех строк в railResultsTable
function showAllRailRows(railResultsTable) {
    const rows = railResultsTable.querySelectorAll('tbody tr');
    let rowsVisible = false; // Флаг, показывающий есть ли видимые строки

    rows.forEach(row => {
        row.style.display = 'table-row'; // Убираем стиль display, чтобы строка была видимой
        rowsVisible = true;
    });

    // Если нет видимых строк, показываем строку с сообщением "Нет данных"
    toggleNoDataMessage(railResultsTable, rowsVisible);
}

// Функция для отображения строки с сообщением "Нет данных", если все строки скрыты
function toggleNoDataMessage(railResultsTable, rowsVisible) {
    const tbodyResults = railResultsTable.querySelector('tbody');
    let rowNotFound = tbodyResults.querySelector('.table-row-not-found');

    if (!rowNotFound) {
        // Создаем строку с сообщением, если её нет
        rowNotFound = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = 'Нет данных';
        td.colSpan = railResultsTable.querySelectorAll('th').length;
        td.style.textAlign = 'center';
        rowNotFound.appendChild(td);
        rowNotFound.classList.add('table-row-not-found', 'hide');
    }

    // Если строки не видны, показываем строку с сообщением
    if (!rowsVisible) {
        tbodyResults.appendChild(rowNotFound);
        setTimeout(() => {
            rowNotFound.classList.replace('hide', 'show');
        }, 100);
    } else {
        // Если есть хотя бы одна видимая строка, скрываем сообщение
        rowNotFound.classList.replace('show', 'hide');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const seaResultsTable = document.getElementById('sea-results');
    const railResultsTable = document.getElementById('rail-results');

    if (seaResultsTable && railResultsTable) {
        const seaTable = seaResultsTable.querySelector('tbody');
        seaTable.addEventListener('click', function (event) {
            const row = event.target.closest('tr');
            if (row) {
                handleRailRowClick(row, railResultsTable);
            }
        });

        const railForm = document.getElementById('rail-form');
        railForm.addEventListener('change', function (event) {
            const row = seaResultsTable.querySelector('.table-row-selected');
            if (row) {
                handleRailRowClick(row, railResultsTable);
            }
        });
    }
});