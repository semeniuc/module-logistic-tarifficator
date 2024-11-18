// Обработчик для кнопок очистки
document.querySelectorAll('.ui-ctl-icon-clear').forEach((button) => {
    button.addEventListener('click', (event) => {
        event.preventDefault(); // Отключаем стандартное действие кнопки

        const targetId = button.getAttribute('data-clear-target'); // Получаем ID инпута для очистки
        const input = document.getElementById(targetId);
        if (input) {
            input.value = ''; // Очищаем поле
            updateSummationForm();
        }
    });
});

// Обработчик для нажатия Enter в инпутах
document.querySelectorAll('input').forEach((input) => {
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault(); // Отключаем стандартное поведение (отправку формы)
            input.blur(); // Снимаем фокус с инпута

        }
    });
});

// Получение суммы из таблицы
function getSumFromTable(tableId, cellIndexes) {
    let sum = 0;
    const selectedRows = document.querySelectorAll('.table-row-selected');

    selectedRows.forEach((row) => {
        if (row.closest('table').id === tableId) {
            const cells = row.querySelectorAll('td');
            cellIndexes.forEach(index => {
                let cellValue;

                const input = cells[index].querySelector('input');
                if (input) {
                    // Если есть вложенный input, берем его значение
                    cellValue = parseFloat(input.value.replace(',', '.').replace(/[^0-9.-]+/g, ""));
                } else {
                    // Если input нет, берем текстовое содержимое ячейки
                    cellValue = parseFloat(cells[index].textContent.replace(',', '.').replace(/[^0-9.-]+/g, ""));
                }

                sum += cellValue || 0;
            });
        }
    });

    return sum;
}

// Получение комиссии из формы
function getValueFromInput(id) {
    const element = document.getElementById(id);
    const button = element.nextElementSibling;

    if (!element) {
        return 0;
    }

    let value = parseFloat(
        element.value.replace(',', '.').replace(/[^0-9.-]+/g, "")
    );

    if (isNaN(value)) {
        value = '';
        button.classList.remove('show'); // Скрыть кнопку плавно
        return 0;
    }

    button.classList.add('show'); // Показать кнопку плавно
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
    let seaConversion = getSumFromTable('sea-results', [7]);
    let seaSum = getSumFromTable('sea-results', [6]);
    
    if (seaConversion > 0) {
        seaSum += (seaSum * seaConversion / 100);
    }

    let railSum = 0;
    let autoSum = 0;

    // Проверяем доп. опции
    const isRailSecurity = document.getElementById('rail-security').checked;
    if (isRailSecurity) {
        railSum = getSumFromTable('rail-results', [6, 7]);
    } else {
        railSum = getSumFromTable('rail-results', [6]);
    }

    // Проверяем доп. опции
    const isAccreditation = document.getElementById('accreditation').checked;
    if (isAccreditation) {
        autoSum = getSumFromTable('auto-results', [5, 7]);
    } else {
        autoSum = getSumFromTable('auto-results', [5]);
    }

    let dropOffSum = getSumFromTable('container-results', [4]);
    let totalSum = 0;

    // Получаем комиссии и курс обмена
    const seaCommission = getValueFromInput('result-sea-commission');
    const railCommission = getValueFromInput('result-rail-commission');
    const autoCommission = getValueFromInput('result-auto-commission');
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
    if (autoCommission > 0) {
        autoSum += autoCommission;
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
    document.getElementById('result-auto-cost').value = `${formattedAutoSum} ₽`;
    document.getElementById('result-rental-cost').value = '$ ' + `${formattedDropOffSum}`;
    document.getElementById('result-total-cost').value = `${formattedTotalSum} ₽`;

    // Обновляем коммиссии
    if (seaCommission > 0) {
        const formattedSeaCommission = formatSum(seaCommission);
        document.getElementById('result-sea-commission').value = `$ ${formattedSeaCommission}`;
    } else {
        document.getElementById('result-sea-commission').value = ``;
    }

    if (railCommission > 0) {
        const formattedRailCommission = formatSum(railCommission);
        document.getElementById('result-rail-commission').value = `${formattedRailCommission} ₽`;
    } else {
        document.getElementById('result-rail-commission').value = ``;
    }

    if (autoCommission > 0) {
        const formattedAutoCommission = formatSum(autoCommission);
        document.getElementById('result-auto-commission').value = `${formattedAutoCommission} ₽`;
    } else {
        document.getElementById('result-auto-commission').value = ``;
    }
}