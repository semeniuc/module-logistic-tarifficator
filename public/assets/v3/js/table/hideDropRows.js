async function handleRowClick(event, containerForm, containerResultsTable) {
    const row = event.target.closest('tr');

    if (row) {
        const checkbox = row.querySelector('input[type="checkbox"]');

        if (checkbox && checkbox.checked) {
            if (row.classList.contains('is-with-drop')) {
                // Блокируем все инпуты в container-form
                toggleFormInputs(containerForm, true);

                // Скрываем строки с данными
                await showRowsData(containerResultsTable, false);
            } else {
                // Разблокируем все инпуты, если класса is-with-drop нет
                toggleFormInputs(containerForm, false);

                // Показываем скрытые строки
                await showRowsData(containerResultsTable, true);
            }
        } else {
            // Разблокируем все инпуты, если класса is-with-drop нет
            toggleFormInputs(containerForm, false);

            // Показываем скрытые строки
            await showRowsData(containerResultsTable, true);
        }

        // Показываем или скрываем "Нет данных"
        showRowNotFound(containerResultsTable);
    }
}

function toggleFormInputs(containerForm, disable) {
    const inputs = containerForm.querySelectorAll('input, select, textarea, button');
    inputs.forEach(input => {
        if (input.disabled !== disable) {
            input.disabled = disable;
        }
    });
}

function showRowsData(containerResultsTable, show) {
    return new Promise(resolve => {
        const tbodyResults = containerResultsTable.querySelector('tbody');
        const rows = tbodyResults.querySelectorAll('tr');

        rows.forEach((row, index) => {
            setTimeout(() => {
                if (show) {
                    row.classList.replace('hide', 'show');
                    row.style.display = 'table-row';
                } else {
                    row.classList.replace('show', 'hide');
                    row.style.display = 'none';
                }

                // Разрешаем Promise, когда последний элемент обработан
                if (index === rows.length - 1) {
                    resolve();
                }
            }, 100);
        });
    });
}

function showRowNotFound(containerResultsTable) {
    const tbodyResults = containerResultsTable.querySelector('tbody');
    const rows = tbodyResults.querySelectorAll('tr:not(.table-row-not-found)');
    let rowNotFound = tbodyResults.querySelector('.table-row-not-found');

    // Создаем строку "Нет данных", если она не существует
    if (!rowNotFound) {
        rowNotFound = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = 'Дроп уже включен в ставку Фрахт';
        td.colSpan = containerResultsTable.closest('table').querySelectorAll('th').length;
        td.style.textAlign = 'center';

        rowNotFound.appendChild(td);
        rowNotFound.classList.add('table-row-not-found', 'hide');
        rowNotFound.style.display = 'none';
        tbodyResults.appendChild(rowNotFound);
    }

    // Проверяем, есть ли хотя бы одна видимая строка
    const hasVisibleRows = Array.from(rows).some(row => !row.classList.contains('hide'));
    
    // Показываем или скрываем строку "Нет данных"
    if (!hasVisibleRows) {
        setTimeout(() => {
            rowNotFound.classList.replace('hide', 'show');
            rowNotFound.style.display = 'table-row';
        }, 100);
    } else {
        setTimeout(() => {
            rowNotFound.classList.replace('show', 'hide');
            rowNotFound.style.display = 'none';
        }, 100);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const seaResultsTable = document.getElementById('sea-results');
    const containerForm = document.getElementById('container-form');
    const containerResultsTable = document.getElementById('container-results');

    if (seaResultsTable && containerForm && containerResultsTable) {
        const tbody = seaResultsTable.querySelector('tbody');

        tbody.addEventListener('click', function (event) {
            handleRowClick(event, containerForm, containerResultsTable);
        });
    }
});