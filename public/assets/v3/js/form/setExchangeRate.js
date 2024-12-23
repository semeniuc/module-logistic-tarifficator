import {fetchExchangeRate} from "../api/exchange/rate.js";

/**
 * Обновление интерфейса с курсом валют
 * @param {Object} response Данные от API
 */
function setExchangeRate(response) {
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
}

function formatDate(date) {
    const [day, month, year] = date.split('/').map(Number);
    return `${day.toString().padStart(2, '0')}.${month.toString().padStart(2, '0')}.${year}`;
}


document.addEventListener('DOMContentLoaded', function () {
    fetchExchangeRate()
        .then(setExchangeRate)
        .catch(error => console.error('Ошибка при обновлении курса валют:', error));
});