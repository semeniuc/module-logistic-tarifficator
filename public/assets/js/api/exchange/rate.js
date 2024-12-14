import {sendAjaxRequest} from "../../ajax.js";

/**
 * Получение курса валют с API
 * @returns {Promise<Object>} Promise с данными о курсе
 */
export function fetchExchangeRate() {
    const url = '/local/modules/logistic.tarifficator/api/rate/get';

    return new Promise((resolve, reject) => {
        sendAjaxRequest(url, 'POST', null, function (response) {
            if (response && response.rate && response.date) {
                resolve(response); // Успешный ответ
            } else {
                reject(new Error('Некорректный формат ответа от API')); // Ошибка
            }
        });
    });
}
