// Получение суммы из таблицы
function getSumFromTable(tableId, cellIndexes) {
    let sum = 0;
    const selectedRows = document.querySelectorAll('.table-row-selected');

    selectedRows.forEach((row) => {
        if (row.closest('table').id === tableId) {
            const cells = row.querySelectorAll('td');
            cellIndexes.forEach(index => {
                sum += parseFloat(cells[index].textContent.replace(',', '.').replace(/[^0-9.-]+/g, "")) || 0;
            });
        }
    });

    return sum;
}

// Получение комиссии из формы
function getCommission(id) {
    const element = document.getElementById(id);
    const value = parseFloat(
        element.value.replace(',', '.').replace(/[^0-9.-]+/g, "")
    );
    if (isNaN(value)) {
        element.value = '';
        return 0;
    }
    return element.value = value;
}

// Форматирование суммы
function formatSum(sum) {
    return parseFloat(sum).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Основная функция обновления формы
export function updateSummationForm() {
    // Получаем суммы из таблиц
    let seaSum = getSumFromTable('sea-results', [6]);
    let railSum = getSumFromTable('rail-results', [5, 6]);
    let dropOffSum = getSumFromTable('container-results', [4]);
    let totalSum = 0;

    // Получаем комиссии и курс обмена
    const seaCommission = getCommission('result-sea-commission');
    const railCommission = getCommission('result-rail-commission');
    const totalCommission = getCommission('result-total-commission')
    const exchangeRate = parseFloat(
        document.getElementById('exchange-rate').value.replace(',', '.').replace(/[^0-9.-]+/g, "")
    ) || 1;

    // Прибавляем комиссии к суммам только если комиссия больше 0
    if (seaCommission > 0) {
        seaSum += seaSum * (seaCommission / 100);
    }
    if (railCommission > 0) {
        railSum += railSum * (railCommission / 100);
    }

    // Конвертируем суммы из долларов в рубли и округляем до двух знаков после запятой
    seaSum = parseFloat(seaSum * exchangeRate);
    dropOffSum = parseFloat(dropOffSum * exchangeRate);

    // Расчет итоговой суммы
    totalSum = seaSum + railSum + dropOffSum;
    if (totalCommission > 0) {
        totalSum += totalSum * (totalCommission / 100);
    }
    
    // Форматируем значения
    const formattedSeaSum = formatSum(seaSum);
    const formattedDropOffSum = formatSum(dropOffSum);
    const formattedRailSum = formatSum(railSum);
    const formattedTotalSum = formatSum(totalSum);

    // Обновляем значения в форме суммирования
    document.getElementById('result-sea-cost').value = `${formattedSeaSum} ₽`;
    document.getElementById('result-rail-cost').value = `${formattedRailSum} ₽`;
    document.getElementById('result-rental-cost').value = `${formattedDropOffSum} ₽`;
    document.getElementById('result-total-cost').value = `${formattedTotalSum} ₽`;
}
