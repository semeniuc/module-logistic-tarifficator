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
    const exchangeRate = parseFloat(
        document.getElementById('exchange-rate').value.replace(',', '.').replace(/[^0-9.-]+/g, "")
    ) || 1;

    // Прибавляем комиссии к суммам только если комиссия больше 0
    if (seaCommission > 0) {
        seaSum += seaCommission;
    }
    if (railCommission > 0) {
        railSum += railCommission;
    }
    if (autoSumCommission > 0) {
        autoSum += autoSum * (autoSumCommission / 100);
    }

    // Конвертируем суммы из долларов в рубли и округляем до двух знаков после запятой
    let seaSumRub = parseFloat(seaSum * exchangeRate);
    let dropOffSumRub = parseFloat(dropOffSum * exchangeRate);

    // Расчет итоговой суммы
    totalSum = seaSumRub + railSum + autoSum + dropOffSumRub;

    // Форматируем суммы
    const formattedSeaSum = formatSum(seaSum);
    const formattedDropOffSum = formatSum(dropOffSum);
    const formattedRailSum = formatSum(railSum);
    const formattedAutoSum = formatSum(autoSum);
    const formattedTotalSum = formatSum(totalSum);

    // Обновляем суммы
    document.getElementById('result-sea-cost').value = '$ ' + `${formattedSeaSum}`;
    document.getElementById('result-rail-cost').value = `${formattedRailSum} ₽`;
    document.getElementById('result-rental-cost').value = '$ ' + `${formattedDropOffSum}`;
    document.getElementById('result-total-cost').value = `${formattedTotalSum} ₽`;
    if (autoSum > 0) {
        document.getElementById('result-auto-cost').value = `${formattedAutoSum} ₽`;
    } else {
        document.getElementById('result-auto-cost').value = ``;
    }

    // Обновляем коммиссии
    if (seaCommission > 0) {
        const formattedSeaCommission = formatSum(seaCommission);
        document.getElementById('result-sea-commission').value = `$ ${formattedSeaCommission}`;
    } else {
        document.getElementById('result-sea-commission').value = ``;
    }

    if (railCommission > 0) {
        const formattedRailCommission = formatSum(railCommission);
        document.getElementById('result-rail-commission').value = `${formattedRailCommission}  ₽`;
    } else {
        document.getElementById('result-rail-commission').value = ``;
    }
}
