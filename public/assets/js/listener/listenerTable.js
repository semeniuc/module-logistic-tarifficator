import {updateSummationForm} from "../action/updateSummationForm.js";

// Обработка выбора строки в таблицах на странице
export function handleRowSelection() {
    const tableBodies = document.querySelectorAll('table tbody');
    tableBodies.forEach(tbody => {
        tbody.addEventListener('click', function (event) {
            // Проверяем, что клик не по элементу input
            if (event.target.tagName === 'INPUT' && event.target.type === 'text') {
                return; // Прерываем обработку, если клик по input
            }

            const row = event.target.closest('tr');
            if (row && !row.classList.contains('table-row-disabled')) {
                const checkbox = row.querySelector('input[type="checkbox"]');

                if (checkbox) {
                    // Переключение состояния чекбокса при клике на строку
                    checkbox.checked = !checkbox.checked;

                    if (checkbox.checked) {
                        // Удаляем класс выделения у всех строк, кроме текущей
                        tbody.querySelectorAll('tr').forEach(tr => {
                            const trCheckbox = tr.querySelector('input[type="checkbox"]');
                            if (tr !== row && trCheckbox && trCheckbox.checked) {
                                trCheckbox.checked = false;
                                tr.classList.remove('table-row-selected');
                            }
                        });

                        // Добавляем класс выделения к текущей строке
                        row.classList.add('table-row-selected');

                        const selectedRowData = {};

                        // Сбор данных из выбранной строки
                        for (let i = 0; i < row.cells.length; i++) {
                            selectedRowData[`column${i}`] = row.cells[i].innerText;
                        }
                    } else {
                        // Если чекбокс снят, снимаем выделение
                        row.classList.remove('table-row-selected');
                    }
                }

                updateSummationForm();
            }
        });
    });
}
