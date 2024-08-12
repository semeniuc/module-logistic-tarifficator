// Функция для отправки данных всех форм при загрузке страницы
function sendFormOnLoad() {
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

// Обработка изменения значений в полях всех форм на странице
function handleFormChanges() {
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

// Обработка выбора строки в таблицах на странице
function handleRowSelection() {
    const tableBodies = document.querySelectorAll('table tbody');
    tableBodies.forEach(tbody => {
        tbody.addEventListener('click', function (event) {
            // Проверяем, был ли клик по строке таблицы
            const row = event.target.closest('tr');
            if (row && !row.classList.contains('table-row-disabled')) {
                // Если строка уже выбрана, снимаем выделение
                if (row.classList.contains('table-row-selected')) {
                    row.classList.remove('table-row-selected');
                } else {
                    // Удаляем класс выбора со всех строк
                    tbody.querySelectorAll('tr').forEach(tr => tr.classList.remove('table-row-selected'));

                    // Добавляем класс выбора к выбранной строке
                    row.classList.add('table-row-selected');

                    const selectedRowData = {};

                    // Сбор данных из выбранной строки
                    for (let i = 0; i < row.cells.length; i++) {
                        selectedRowData[`column${i}`] = row.cells[i].innerText;
                    }

                    // Определяем URL для отправки данных строки
                    const tableAction = row.closest('table').getAttribute('data-action') || '/local/modules/logistic.tarifficator/api/list/select';

                    // Отправляем данные выбранной строки
                    sendAjaxRequest(tableAction, 'POST', selectedRowData, function (response) {
                        console.log('Ответ от сервера для строки:', response);
                        // Здесь можно выполнить дополнительные действия на основе ответа
                    });
                }
            }
        });
    });
}

// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    sendFormOnLoad();
    handleFormChanges();
    handleRowSelection();
});
