export function autoSelectRow(table, selected) {
    const containerForm = document.getElementById('container-form');
    if (table === 'sea-results' && selected) {

        // Если во Фрахте выбрана строка с типом "COC", то автомат. выбрать предложение в Drop off
        if (selected.cells[4].innerText.trim().toLowerCase() === 'coc') {
            const seaContractor = selected.cells[1].innerText.trim().toLowerCase();
            const seaDestination = selected.cells[3].innerText.trim().toLowerCase();

            if (seaContractor && seaDestination) {
                const containerResultsTable = document.getElementById('container-results');
                if (containerResultsTable) {
                    const rows = containerResultsTable.querySelectorAll('tbody tr');

                    // Сначала сбрасываем выделение у всех строк
                    // rows.forEach(row => {
                    //     row.classList.remove('table-row-selected');
                    // });

                    // Далее ищем строку, которая соответствует условиям
                    for (let i = 0; i < rows.length; i++) {
                        const row = rows[i];
                        const contractorCell = row.cells[1]?.innerText.trim().toLowerCase();
                        const destinationCell = row.cells[2]?.innerText.trim().toLowerCase();

                        // Проверяем совпадение по contractor и destination и что строка не отключена
                        if (contractorCell === seaContractor
                            && destinationCell === seaDestination
                            && !row.classList.contains('table-row-disabled')
                            && !row.classList.contains('table-row-selected')
                        ) {
                            row.click();

                            // Создаем событие изменения для формы
                            const changeEvent = new Event('change', {bubbles: true});
                            containerForm.dispatchEvent(changeEvent); // Вызов события change на форме

                            break;
                        }
                    }
                }
            }
        }
    }
}
