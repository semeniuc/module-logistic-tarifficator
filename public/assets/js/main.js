// Импортируем модули
import './ajax.js';
import './table.js';
import './forms.js';

// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    sendFormOnLoad(); // Отправка данных всех форм при загрузке
    handleFormChanges(); // Обработка изменения значений в полях всех форм
    handleRowSelection(); // Обработка выбора строки в таблицах
});
