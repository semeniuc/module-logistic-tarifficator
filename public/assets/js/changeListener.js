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

    // Функция для обновления таблицы
    function updateTable(data, formId) {
        const tableId = formId.replace('-form', '-results');
        const tableBody = document.querySelector(`#${tableId} tbody`);

        // Функция для плавного удаления строк
        function removeRows() {
            return new Promise(resolve => {
                const existingRows = tableBody.querySelectorAll('tr');
                const totalRows = existingRows.length;
                let removedCount = 0;

                existingRows.forEach(row => {
                    row.classList.add('hide');
                    row.addEventListener('transitionend', () => {
                        row.remove();
                        removedCount++;
                        if (removedCount === totalRows) {
                            resolve(); // Разрешаем промис, когда все строки удалены
                        }
                    }, { once: true }); // Событие срабатывает один раз
                });

                // Если нет строк для удаления, сразу разрешаем промис
                if (totalRows === 0) {
                    resolve();
                }
            });
        }

        // Функция для плавного добавления строк
        function addRows() {
            data.forEach(row => {
                const tr = document.createElement('tr');
                Object.values(row).forEach(cellData => {
                    const td = document.createElement('td');

                    // Проверяем длину текста
                    if (cellData.length > 60) {
                        td.setAttribute('title', cellData); // Полное содержимое в атрибут title
                        td.textContent = cellData.slice(0, 60) + '...'; // Ограничиваем текст и добавляем троеточие
                    } else {
                        td.textContent = cellData;
                    }

                    tr.appendChild(td);
                });

                // Добавляем строку скрытой
                tr.classList.add('hide');
                tableBody.appendChild(tr);

                // Плавное появление строки
                setTimeout(() => {
                    tr.classList.remove('hide');
                    tr.classList.add('show');
                }, 0);
            });
        }


        // Асинхронное обновление таблицы
        async function update() {
            await removeRows(); // Дожидаемся завершения удаления строк
            addRows(); // Добавляем новые строки
        }

        update(); // Запускаем обновление таблицы
    }

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
            sendAjaxRequest(formAction, 'POST', data, function(response) {
                // Обновление таблицы с новыми данными
                updateTable(response, form.id);
            });
        });
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
                // Обновление таблицы с новыми данными
                updateTable(response, form.id);
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

    // Вызываем функцию для отправки данных всех форм при загрузке страницы
    sendFormOnLoad();

});
