// Функция для обновления таблицы
export function updateTable(data, formId) {
    const tableId = formId.replace('-form', '-results');
    const tableBody = document.querySelector(`#${tableId} tbody`);

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
                Object.values(row).forEach(cellData => {
                    const td = document.createElement('td');

                    // Проверяем, содержит ли значение подстроки "soc", "coc", "40hc", "20dry"
                    const keywords = ['soc', 'coc', '40hc', '20dry'];
                    keywords.forEach(keyword => {
                        if (cellData.toLowerCase().includes(keyword)) {
                            cellData = cellData.toUpperCase();
                        }
                    });

                    // Проверяем длину текста
                    if (cellData.length > 30) {
                        td.setAttribute('title', cellData); // Полное содержимое в атрибут title
                        td.textContent = cellData.slice(0, 30) + '...'; // Ограничиваем текст и добавляем троеточие
                    } else {
                        td.textContent = cellData;
                    }

                    tr.appendChild(td);
                });

                // Добавляем строку скрытой
                tr.classList.add('hide');
                tableBody.appendChild(tr);

                // Плавное появление строки
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