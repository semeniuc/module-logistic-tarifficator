import {sendAjaxRequest} from "./ajax.js";
import {updateTable} from "./updateTable.js";

// Функция для отправки данных всех форм при загрузке страницы
export function sendFormOnLoad() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const formElement = document.querySelector(`#${form.id}`);
        const formData = new FormData();

        // Обходим все элементы формы, включая отключённые
        const elements = formElement.querySelectorAll('input, select, textarea');
        elements.forEach(element => {
            if (element.name) {
                formData.append(element.name, element.value);
            }
        });

        const data = {
            formId: form.id,
            fields: Object.fromEntries(formData.entries())
        };

        // Определяем URL для отправки формы
        const formAction = form.getAttribute('action') || '/local/modules/logistic.tarifficator/api/list/get';

        // Отправляем запрос при загрузке страницы
        sendAjaxRequest(formAction, 'POST', data, function (response) {
            // Обновление таблицы с новыми данными
            updateTable(response, form.id);
        });
    });
}
