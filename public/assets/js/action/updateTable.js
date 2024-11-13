import {notationHover} from "../listener/listenerNotation.js";

export function updateTable(data, formId) {
    const tableId = formId.replace('-form', '-results');
    const tableBody = document.querySelector(`#${tableId} tbody`);

    if (!tableBody) return;

    async function removeRows() {
        const existingRows = Array.from(tableBody.querySelectorAll('tr:not(.table-row-selected)'));
        if (existingRows.length === 0) return;

        await Promise.all(existingRows.map(row =>
            new Promise(resolve => {
                row.classList.add('hide');
                row.addEventListener('transitionend', () => {
                    row.remove();
                    resolve();
                }, {once: true});
            })
        ));
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
                tableBody.appendChild(tr);
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
            tr.classList.remove('hide');
            tr.classList.add('show');
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
        const tr = document.createElement('tr');
        if (row.isActive === false) tr.classList.add('table-row-disabled');

        const checkboxTd = createCheckboxCell(row.isActive);
        tr.appendChild(checkboxTd);

        Object.keys(row).forEach(key => {
            if (key !== 'isActive') {
                const td = document.createElement('td');
                td.textContent = formatCellData(row[key], key);

                if (key === 'comment' && row[key].length > 0) {
                    td.classList.add('comment-icon');
                    td.setAttribute('data-title', row[key]);
                    td.textContent = ''; // Очищаем текстовое содержимое ячейки

                    // Создаем внутренний span
                    const iconSpan = document.createElement('span');
                    iconSpan.className = 'icon'; // Устанавливаем класс для span
                    td.appendChild(iconSpan); // Добавляем span в ячейку
                }

                tr.appendChild(td); // Добавляем ячейку в строку
            }
        });

        tr.classList.add('hide');

        setTimeout(() => {
            tr.classList.remove('hide');
            tr.classList.add('show');
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
        if (keywords.some(keyword => cellData.toLowerCase().includes(keyword))) {
            return cellData.toUpperCase();
        }
        return cellData;
    }

    function sortRows() {
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        rows.sort((a, b) => a.classList.contains('table-row-disabled') - b.classList.contains('table-row-disabled'));
        rows.forEach(row => tableBody.appendChild(row));
    }

    async function update() {
        await removeRows();
        clearTable();
        addRows();
        sortRows();
        notationHover();
    }

    update();
}
