import {sendAjaxRequest} from "../action/ajax.js";

// Обработка выбора строки в таблицах на странице
export function handleRowSelection() {
    const tableBodies = document.querySelectorAll('table tbody');
    tableBodies.forEach(tbody => {
        tbody.addEventListener('click', function (event) {
            // Проверяем, был ли клик по строке таблицы
            const row = event.target.closest('tr');
            if (row && !row.classList.contains('table-row-disabled')) {
                // Если строка уже выбрана, снимаем выделение
                if (row.classList.contains('table-row-selected')) {
                    row.classList.remove('table-row-selected');
                } else {
                    // Удаляем класс выбора со всех строк
                    tbody.querySelectorAll('tr').forEach(tr => tr.classList.remove('table-row-selected'));

                    // Добавляем класс выбора к выбранной строке
                    row.classList.add('table-row-selected');

                    const selectedRowData = {};

                    // Сбор данных из выбранной строки
                    for (let i = 0; i < row.cells.length; i++) {
                        selectedRowData[`column${i}`] = row.cells[i].innerText;
                    }

                    // Определяем URL для отправки данных строки
                    const tableAction = row.closest('table').getAttribute('data-action') || '/local/modules/logistic.tarifficator/api/list/select';

                    // Отправляем данные выбранной строки
                    sendAjaxRequest(tableAction, 'POST', selectedRowData, function (response) {
                        console.log('Ответ от сервера для строки:', response);
                        // Здесь можно выполнить дополнительные действия на основе ответа
                    });
                }
            }
        });
    });
}