import {sendAjaxRequest} from "./ajax.js";
import {updateTable} from "./updateTable.js";

// Функция для отправки данных всех форм при загрузке страницы
export function sendFormOnLoad() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const formData = new FormData(form);
        const data = {};
        data['formId'] = form.id;
        data['fields'] = {};

        // Преобразуем данные формы в объект
        formData.forEach((value, key) => {
            data['fields'][key] = value;
        });

        // Определяем URL для отправки формы
        const formAction = form.getAttribute('action') || '/local/modules/logistic.tarifficator/api/list/get';

        // Отправляем запрос при загрузке страницы
        sendAjaxRequest(formAction, 'POST', data, function (response) {
            // Обновление таблицы с новыми данными
            updateTable(response, form.id);
        });
    });
}
