import {sendAjaxRequest} from './ajax.js'; // Обновите путь к файлу, если необходимо

export function fetchAndUpdateExchangeRate() {
    const url = '/local/modules/logistic.tarifficator/api/rate/get';

    // Отправляем POST-запрос на получение курса доллара
    sendAjaxRequest(url, 'POST', null, function (response) {
        const rate = response.rate;
        const date = response.date;

        // Форматируем дату в нужном формате (ДД.ММ.ГГГГ)
        const formattedDate = formatDate(date);

        // Обновляем поле ввода курсом доллара
        const exchangeRateInput = document.getElementById('exchange-rate');
        exchangeRateInput.value = rate.toFixed(2) + ' ₽';

        // Обновляем элемент с датой
        const dateElement = document.getElementById('date-exchange-rate');
        dateElement.textContent = formattedDate;
    });
}

// Функция для форматирования даты в формат ДД.ММ.ГГГГ
function formatDate(dateStr) {
    const [day, month, year] = dateStr.split('/').map(Number);
    return `${day.toString().padStart(2, '0')}.${month.toString().padStart(2, '0')}.${year}`;
}
