import {sendAjaxRequest} from "../action/ajax.js";
import {updateTable} from "../action/updateTable.js";
import {updateSummationForm} from "../action/updateSummationForm.js";

// Обработка изменения значений в полях всех форм на странице
export function handleFormChanges() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('change', function (event) {
            // Запускаем функцию для обновления формы
            updateSummationForm();

            // Проверка: если изменённый элемент является чекбоксом, прерываем обработчик
            const changedElement = event.target;
            if (changedElement.type === 'checkbox') {
                return;
            }

            // Прерываем обработчик, чтобы не отправлять данные формы
            if (form.id === 'result-form') {
                return;
            }

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

                // Обновление связанных фильтров
                // if (form.id === 'sea-form') {
                //     if (changedElement.name === 'destination') {
                //         let terminals = [...new Set(response.map(item => item.terminal))];
                //         if (terminals.length > 0) {
                //             updateSelectOptions('sea-terminal', terminals);
                //         }
                //     }
                // } else if (form.id === 'rail-form') {
                //     if (changedElement.name === 'destination') {
                //         let stations = [...new Set(response.map(item => item.station))];
                //         if (stations.length > 0) {
                //             updateSelectOptions('rail-station', stations);
                //         }
                //     }
                // }
            });
        });
    });
}
