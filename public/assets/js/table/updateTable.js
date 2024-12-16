import {showComments} from "./showComment.js";

export function updateTable(formId, data) {
    const tableId = formId.replace('-form', '-results');
    const tableBody = document.querySelector(`#${tableId} tbody`);

    if (!tableBody) return;

    async function removeRows() {
        const existingRows = Array.from(tableBody.querySelectorAll('tr'));
        if (existingRows.length === 0) return;

        // Используем Promise.all для асинхронного ожидания завершения анимации всех строк
        await Promise.all(existingRows.map(row => {
            return new Promise(resolve => {
                // Добавляем класс 'hide' для анимации
                row.classList.replace('show', 'hide');
                // Слушаем завершение анимации
                row.addEventListener('transitionend', () => {
                    row.remove(); // Удаляем строку из DOM
                    resolve();
                }, {once: true}); // Обработчик срабатывает только один раз
            });
        }));
    }

    function clearTable() {
        const selectedRows = tableBody.querySelectorAll('tr.table-row-selected');
        tableBody.innerHTML = '';
        selectedRows.forEach(row => tableBody.appendChild(row));
    }

    function addRows() {
        if (data.length === 0) {
            const tr = createNoDataRow();
            tableBody.appendChild(tr);
            return;
        }

        data.forEach(row => {
            if (!isDuplicateRow(tableBody, row)) {
                const tr = createTableRow(row);

                if (tr) {
                    tableBody.appendChild(tr);
                }
            }
        });
    }

    function createNoDataRow() {
        const tr = document.createElement('tr');
        const td = document.createElement('td');
        td.textContent = 'Нет данных';
        td.colSpan = tableBody.closest('table').querySelectorAll('th').length;
        td.style.textAlign = 'center';
        tr.appendChild(td);
        tr.classList.add('table-row-not-found', 'hide');

        setTimeout(() => {
            tr.classList.replace('hide', 'show');
        }, 100);

        return tr;
    }

    function isDuplicateRow(tableBody, row) {
        const selectedRows = Array.from(tableBody.querySelectorAll('tr.table-row-selected'));

        // Если нет выбранных строк, дубликатов быть не может
        if (selectedRows.length === 0) return false;

        return selectedRows.some((selectedRow, rowIndex) => {
            const rowKeys = Object.keys(row).filter(key => key !== 'isActive');
            const selectedCells = selectedRow.querySelectorAll('td:not(.select-box)');

            if (selectedCells.length !== rowKeys.length) {
                return false;
            }

            // Сравниваем каждую ячейку строки, кроме последней
            return Array.from(selectedCells).slice(0, -1).every((cell, index) => {
                const rowData = row[rowKeys[index]].toString().trim().toLowerCase();
                const cellData = cell.textContent.trim().toLowerCase();
                return cellData === rowData;
            });
        });
    }

    function createTableRow(row) {
        // Пропустить скрытые строки
        if (row.isHidden) return null;

        const tr = document.createElement('tr');
        if (!row.isActive) tr.classList.add('table-row-disabled');

        // Добавляем чекбокс
        tr.appendChild(createCheckboxCell(row.isActive));

        const exceptionKeys = ['isActive', 'isHidden', 'isWithService', 'isWithDrop'];
        let isSecondCell = true; // Флаг для добавления класса is-with-service

        Object.entries(row).forEach(([key, value]) => {
            if (exceptionKeys.includes(key)) return;

            const td = document.createElement('td');

            if (key === 'conversion') {
                // Ячейка с вводом
                const input = document.createElement('input');
                input.type = 'text';
                input.value = value;
                input.classList.add('ui-ctl-element');
                td.classList.add('conversion-input');
                td.appendChild(input);
            } else if (key === 'comment' && value.length > 0) {
                // Ячейка с иконкой комментария
                td.classList.add('comment-icon');
                td.setAttribute('data-title', value);

                const iconSpan = document.createElement('span');
                iconSpan.className = 'icon';
                td.appendChild(iconSpan);
            } else {
                // Обычная ячейка
                td.textContent = formatCellData(value, key);
            }

            // Добавляем классы для сервисных или drop-ячейкок
            if (row.isWithService && isSecondCell) {
                tr.classList.add('is-with-service');
                td.classList.add('icon-service');
                isSecondCell = false;
            }
            if (row.isWithDrop) {
                tr.classList.add('is-with-drop');
            }

            tr.appendChild(td);
        });

        // Анимация появления строки
        tr.classList.add('hide');
        setTimeout(() => {
            tr.classList.replace('hide', 'show');
        }, 100);

        return tr;
    }

    function createCheckboxCell(isActive) {
        const checkboxTd = document.createElement('td');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        if (!isActive) checkbox.disabled = true;
        checkboxTd.classList.add('select-box');
        checkboxTd.appendChild(checkbox);
        return checkboxTd;
    }

    function formatCellData(cellData, key) {
        const keywords = ['soc', 'coc', '40hc', '20dry'];

        // Преобразуем только строковые данные к нижнему регистру и проверяем ключевые слова
        if (typeof cellData === 'string' && keywords.some(keyword => cellData.toLowerCase().includes(keyword))) {
            return cellData.toUpperCase();
        }

        // Если это не строка, просто возвращаем исходное значение
        return cellData;
    }

    function sortRows() {
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        
        // Сортируем сначала по классу .table-row-disabled, потом по классу .is-with-service
        rows.sort((a, b) => {
            // Сортировка по .table-row-disabled (сначала строки без этого класса, потом с этим)
            const disabledA = a.classList.contains('table-row-disabled');
            const disabledB = b.classList.contains('table-row-disabled');

            if (disabledA !== disabledB) {
                return disabledA ? 1 : -1; // true => 1 (вниз), false => -1 (вверх)
            }

            // Сортировка по .is-with-service (сначала строки с этим классом, потом без)
            const serviceA = a.classList.contains('is-with-service');
            const serviceB = b.classList.contains('is-with-service');

            if (serviceA !== serviceB) {
                return serviceA ? -1 : 1; // true => -1 (вверх), false => 1 (вниз)
            }

            return 0; // Если оба равны, порядок не меняется
        });

        // Перемещаем строки в DOM в отсортированном порядке
        rows.forEach(row => tableBody.appendChild(row));
    }

    async function update() {
        await removeRows();
        clearTable();
        addRows();
        sortRows();
        showComments();
    }

    update();
}
