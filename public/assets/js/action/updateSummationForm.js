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
function getValueFromInput(id) {
    const element = document.getElementById(id);

    if (!element) {
        return 0;
    }

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
    let autoSum = getValueFromInput('result-auto-cost');
    let totalSum = 0;

    // Получаем комиссии и курс обмена
    const seaCommission = getValueFromInput('result-sea-commission');
    const railCommission = getValueFromInput('result-rail-commission');
    const autoSumCommission = getValueFromInput('result-auto-commission');
    const totalCommission = getValueFromInput('result-total-commission');
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
    if (autoSumCommission > 0) {
        autoSum += autoSum * (autoSumCommission / 100);
    }

    // Конвертируем суммы из долларов в рубли и округляем до двух знаков после запятой
    seaSum = parseFloat(seaSum * exchangeRate);
    dropOffSum = parseFloat(dropOffSum * exchangeRate);

    // Расчет итоговой суммы
    totalSum = seaSum + railSum + autoSum + dropOffSum;
    if (totalCommission > 0) {
        totalSum += totalSum * (totalCommission / 100);
    }

    // Форматируем значения
    const formattedSeaSum = formatSum(seaSum);
    const formattedDropOffSum = formatSum(dropOffSum);
    const formattedRailSum = formatSum(railSum);
    const formattedAutoSum = formatSum(autoSum);
    const formattedTotalSum = formatSum(totalSum);

    // Обновляем значения в форме суммирования
    document.getElementById('result-sea-cost').value = `${formattedSeaSum} ₽`;
    document.getElementById('result-rail-cost').value = `${formattedRailSum} ₽`;
    document.getElementById('result-rental-cost').value = `${formattedDropOffSum} ₽`;
    document.getElementById('result-auto-cost').value = `${formattedAutoSum} ₽`;
    document.getElementById('result-total-cost').value = `${formattedTotalSum} ₽`;
}
