import {sendAjaxRequest} from "../../ajax.js";

/**
 * Получение данных для таблицы
 * @param {string} formId - URL для отправки данных
 * @param {Array} fields - Данные формы
 * @returns {Promise<Object>} Promise с данными
 */
export function fetchTableData(formId, fields) {
    const url = '/local/modules/logistic.tarifficator/api/list/get';
    const data = {formId: formId, fields: fields};

    return new Promise((resolve, reject) => {
        sendAjaxRequest(url, 'POST', data, function (response) {
            if (response) {
                resolve(response); // Успешный ответ
            } else {
                reject(new Error('Некорректный формат ответа от API')); // Ошибка
            }
        });
    });
}
