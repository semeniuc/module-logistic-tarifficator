function handleRowClick(event, containerForm, containerResultsTable) {
    const row = event.target.closest('tr');

    if (row) {
        const checkbox = row.querySelector('input[type="checkbox"]');

        if (checkbox && checkbox.checked) {
            if (row.classList.contains('is-with-drop')) {
                // Блокируем все инпуты в container-form
                toggleFormInputs(containerForm, true);

                // Очищаем таблицу container-results и добавляем строку "Нет данных"
                updateResultsTable(containerResultsTable, true);
            } else {
                // Разблокируем все инпуты, если класса is-with-drop нет
                toggleFormInputs(containerForm, false);

                // Очищаем таблицу container-results
                updateResultsTable(containerResultsTable, false);
            }
        } else {
            // Разблокируем все инпуты, если класса is-with-drop нет
            toggleFormInputs(containerForm, false);

            // Очищаем таблицу container-results
            updateResultsTable(containerResultsTable, false);
        }
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

function updateResultsTable(containerResultsTable, showNoData) {
    const tbodyResults = containerResultsTable.querySelector('tbody');


    if (showNoData) {
        // Скрываем все существующие строки
        const rows = tbodyResults.querySelectorAll('tr');
        rows.forEach(row => {
            row.classList.replace('show', 'hide');
            row.style.display = 'none';
        });

        // Добавляем строку с сообщением
        let rowNotFound = tbodyResults.querySelector('.table-row-not-found');
        if (!rowNotFound) {
            rowNotFound = document.createElement('tr');
            const td = document.createElement('td');
            td.textContent = 'Дроп уже включен в ставку Фрахт';
            td.colSpan = containerResultsTable.closest('table').querySelectorAll('th').length;
            td.style.textAlign = 'center';
            rowNotFound.appendChild(td);
            rowNotFound.classList.add('table-row-not-found', 'hide');
            tbodyResults.appendChild(rowNotFound);
        }

        // Плавно показываем строку с сообщением
        setTimeout(() => {
            rowNotFound.classList.replace('hide', 'show');
        }, 100);
    } else {
        // Убираем скрытие у всех строк
        const rows = tbodyResults.querySelectorAll('tr');
        rows.forEach(row => {
            row.classList.replace('hide', 'show');
            row.style.display = 'table-row';
        });

        // Удаляем строку с сообщением
        const rowNotFound = tbodyResults.querySelector('.table-row-not-found');
        if (rowNotFound) {
            rowNotFound.remove();
        }
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