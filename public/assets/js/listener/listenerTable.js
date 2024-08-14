import {sendAjaxRequest} from "../action/ajax.js";

// Обработка выбора строки в таблицах на странице
export function handleRowSelection() {
    const tableBodies = document.querySelectorAll('table tbody');
    tableBodies.forEach(tbody => {
        tbody.addEventListener('click', function (event) {
            const row = event.target.closest('tr');
            if (row && !row.classList.contains('table-row-disabled')) {
                const checkbox = row.querySelector('input[type="checkbox"]');

                if (checkbox) {
                    if (checkbox.checked) {
                        // Удаляем класс выделения у всех строк, кроме текущей
                        tbody.querySelectorAll('tr').forEach(tr => {
                            const trCheckbox = tr.querySelector('input[type="checkbox"]');
                            if (tr !== row && trCheckbox && trCheckbox.checked) {
                                trCheckbox.checked = false;
                                tr.classList.remove('table-row-selected');
                            }
                        });

                        // Добавляем классы выделения и фона к текущей строке
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
                    } else {
                        // Если чекбокс не отмечен, снимаем выделение
                        row.classList.remove('table-row-selected');
                    }
                }
            }
        });
    });
}
