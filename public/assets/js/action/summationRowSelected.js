export function updateSummationForm() {
    let seaSum = 0;
    let railSum = 0;
    let autoSum = 0;
    let dropOffSum = 0;

    // Ищем все строки с классом 'table-row-selected'
    const selectedRows = document.querySelectorAll('.table-row-selected');

    // Проверяем, есть ли выбранные строки
    if (selectedRows.length > 0) {
        selectedRows.forEach((row) => {
            const tableId = row.closest('table').id;  // Определяем ID таблицы
            const cells = row.querySelectorAll('td');

            switch (tableId) {
                case 'sea-results':
                    seaSum += parseFloat(cells[6].textContent.replace(',', '.').replace(/[^0-9.-]+/g, "")) || 0;
                    break;

                case 'rail-results':
                    railSum += parseFloat(cells[5].textContent.replace(',', '.').replace(/[^0-9.-]+/g, "")) || 0;
                    railSum += parseFloat(cells[6].textContent.replace(',', '.').replace(/[^0-9.-]+/g, "")) || 0;
                    break;

                case 'container-results':
                    dropOffSum += parseFloat(cells[4].textContent.replace(',', '.').replace(/[^0-9.-]+/g, "")) || 0;
                    break;

                default:
                    console.warn(`Unknown table ID: ${tableId}`);
                    break;
            }
        });
    }

    // Получаем курс доллара из инпута
    const exchangeRate = parseFloat(
        document.getElementById('exchange-rate').value.replace(',', '.').replace(/[^0-9.-]+/g, "")
    ) || 1;

    // Конвертируем суммы из долларов в рубли и округляем до двух знаков после запятой
    seaSum = parseFloat(seaSum * exchangeRate);
    dropOffSum = parseFloat(dropOffSum * exchangeRate);
    
    // Форматирование значений
    const formattedSeaSum = parseFloat(seaSum).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    const formattedDropOffSum = parseFloat(dropOffSum).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    const formattedRailSum = parseFloat(railSum).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    const formattedAutoSum = parseFloat(autoSum).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    // Обновляем значения в форме суммирования
    document.getElementById('result-sea-cost').value = `${formattedSeaSum} ₽`;
    document.getElementById('result-rail-cost').value = `${formattedRailSum} ₽`;
    document.getElementById('result-auto-cost').value = `${formattedAutoSum} ₽`;
    document.getElementById('result-rental-cost').value = `${formattedDropOffSum} ₽`;
}
