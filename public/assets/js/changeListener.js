document.addEventListener('DOMContentLoaded', function() {

    // Функция для отправки AJAX запроса
    function sendAjaxRequest(url, method, data, callback) {
        const xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Успешный ответ от сервера
                    callback(JSON.parse(xhr.responseText));
                } else {
                    console.error('Ошибка: ' + xhr.status);
                }
            }
        };

        // Отправка данных в формате JSON
        xhr.send(JSON.stringify(data));
    }

    // Обработка изменения значений в полях всех форм на странице
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('change', function() {
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
            sendAjaxRequest(formAction, 'POST', data, function(response) {
                console.log('Ответ от сервера для формы:', response);
                // Здесь можно обновить таблицу или другой контент
            });
        });
    });

    // Обработка выбора строки в таблицах на странице
    const tableRows = document.querySelectorAll('table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('click', function() {
            const selectedRowData = {};

            // Сбор данных из выбранной строки
            for (let i = 0; i < this.cells.length; i++) {
                selectedRowData[`column${i}`] = this.cells[i].innerText;
            }

            // Определяем URL для отправки данных строки
            const tableAction = row.closest('table').getAttribute('data-action') || '/local/modules/logistic.tarifficator/api/list/select';

            // Отправляем данные выбранной строки
            sendAjaxRequest(tableAction, 'POST', selectedRowData, function(response) {
                console.log('Ответ от сервера для строки:', response);
                // Здесь можно выполнить дополнительные действия на основе ответа
            });
        });
    });
});
