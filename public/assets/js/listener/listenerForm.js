import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

// Обработка изменения значений в полях всех форм на странице
export function handleFormChanges() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('change', function () {
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

            // Отправляем запрос при изменении полей формы
            sendAjaxRequest(formAction, 'POST', data, function (response) {
                // Обновление таблицы с новыми данными
                updateTable(response, form.id);
            });
        });
    });
}