// Функция для отправки AJAX запроса
function sendAjaxRequest(url, method, data, callback) {
    const xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

    xhr.onreadystatechange = function () {
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
