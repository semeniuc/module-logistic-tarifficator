import {fetchTableData} from "../api/table/list.js";
import {updateTable} from "../table/updateTable.js";
import {syncFormChange} from "./syncFormChange.js";

const forms = document.querySelectorAll('form');

/**
 * Получение данных для таблицы
 * @param {Object} form - URL для отправки данных
 */
async function updateTableData(form) {
    const formElement = document.querySelector(`#${form.id}`);
    const formData = new FormData(formElement);
    const fields = {};

    // Преобразуем FormData в объект
    formData.forEach((value, key) => {
        fields[key] = value;
    });

    try {
        // Отправляем данные через API и обновляем таблицу
        const response = await fetchTableData(form.id, fields);
        updateTable(form.id, response);
    } catch (error) {
        console.error('Ошибка при отправке данных:', error);
    }
}

// Устанавливаем обработчики событий
forms.forEach(form => {
    // Событие для завершения синхронизации
    form.addEventListener('formSyncComplete', function () {
        console.log(`Синхронизация формы ${form.id} завершена`);
        updateTableData(form);
    });

    // Событие для отслеживания изменений
    form.addEventListener('change', async function (event) {
        const changedElement = event.target;

        // Пропускаем события, вызванные искусственно
        if (changedElement.dataset.ignoreChange === "true") {
            return;
        }

        // Пропускаем чекбоксы
        if (changedElement.type === 'checkbox') {
            return;
        }

        try {
            await syncFormChange(form);

            if (form.id !== 'sea-form' && form.id !== 'result-form') {
                await updateTableData(form);
            }

        } catch (error) {
            console.error('Ошибка во время синхронизации:', error);
        }
    });
});
