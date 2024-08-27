// Функция для обновления таблицы
export function updateTable(data, formId) {
    const tableId = formId.replace('-form', '-results');
    const tableBody = document.querySelector(`#${tableId} tbody`);

    if (!tableBody) {
        return;
    }

    // Функция для плавного удаления строк
    function removeRows() {
        return new Promise(resolve => {
            const existingRows = tableBody.querySelectorAll('tr');
            const totalRows = existingRows.length;
            let removedCount = 0;

            existingRows.forEach(row => {
                // Проверяем, если строка имеет класс table-row-selected, пропускаем её
                if (row.classList.contains('table-row-selected')) {
                    removedCount++;
                    if (removedCount === totalRows) {
                        resolve(); // Разрешаем промис, когда все строки удалены или пропущены
                    }
                    return;
                }

                row.classList.add('hide');
                row.addEventListener('transitionend', () => {
                    row.remove();
                    removedCount++;
                    if (removedCount === totalRows) {
                        resolve(); // Разрешаем промис, когда все строки удалены
                    }
                }, {once: true}); // Событие срабатывает один раз
            });

            // Если нет строк для удаления, сразу разрешаем промис
            if (totalRows === 0) {
                resolve();
            }
        });
    }


    // Функция для плавного добавления строк
    function addRows() {
        if (data.length === 0) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.textContent = 'Нет данных';
            td.setAttribute('colspan', tableBody.closest('table').querySelectorAll('th').length);
            td.style.textAlign = 'center';
            tr.appendChild(td);

            tr.setAttribute('class', 'table-row-disabled');
            tr.classList.add('hide');
            tableBody.appendChild(tr);

            setTimeout(() => {
                tr.classList.remove('hide');
                tr.classList.add('show');
            }, 0);
        } else {
            data.forEach(row => {
                const tr = document.createElement('tr');

                // Если isActive равно false, добавляем класс table-row-disabled
                if (row.isActive === false) {
                    tr.classList.add('table-row-disabled');
                }

                // Создаем чекбокс и добавляем его в первую ячейку
                const checkboxTd = document.createElement('td');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkboxTd.classList.add('select-box');
                checkboxTd.appendChild(checkbox);
                tr.appendChild(checkboxTd);

                // Делаем чекбокс неактивным, если isActive равно false
                if (row.isActive === false) {
                    checkbox.disabled = true;
                }

                // Проходим по ключам, кроме isActive
                Object.keys(row).forEach(key => {
                    if (key !== 'isActive') {
                        const td = document.createElement('td');
                        let cellData = row[key];

                        const keywords = ['soc', 'coc', '40hc', '20dry'];
                        keywords.forEach(keyword => {
                            if (cellData.toLowerCase().includes(keyword)) {
                                cellData = cellData.toUpperCase();
                            }
                        });

                        if (cellData.length > 30) {
                            td.setAttribute('title', cellData);
                            td.textContent = cellData.slice(0, 30) + '...';
                        } else {
                            td.textContent = cellData;
                        }

                        tr.appendChild(td);
                    }
                });

                tr.classList.add('hide');
                tableBody.appendChild(tr);

                setTimeout(() => {
                    tr.classList.remove('hide');
                    tr.classList.add('show');
                }, 0);
            });
        }
    }

    // Асинхронное обновление таблицы
    async function update() {
        await removeRows(); // Дожидаемся завершения удаления строк
        addRows(); // Добавляем новые строки
    }

    update(); // Запускаем обновление таблицы
}