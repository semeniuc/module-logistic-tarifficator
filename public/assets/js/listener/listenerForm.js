import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";

// Обработка изменения значений в полях всех форм на странице
export function handleFormChanges() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('change', function () {
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

            // Отправляем запрос при изменении полей формы
            sendAjaxRequest(formAction, 'POST', data, function (response) {
                // Обновление таблицы с новыми данными
                updateTable(response, form.id);
            });
        });
    });
}