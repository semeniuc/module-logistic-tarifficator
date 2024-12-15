import {sendAjaxRequest} from "../../ajax.js";

/**
 * Получение значений для связанных фильтров
 * @param {string} formId
 * @param {string} sourceSelect
 * @param {string} sourceSelectOption
 * @param {string} targetSelect
 * @returns {Promise<Object>} Promise с данными
 */
export function fetchOptionData(formId, sourceSelect, sourceSelectOption, targetSelect) {
    const url = '/local/modules/logistic.tarifficator/api/option/get';
    const data = {
        formId: formId,
        sourceSelect: sourceSelect,
        sourceSelectOption: sourceSelectOption,
        targetSelect: targetSelect
    };

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