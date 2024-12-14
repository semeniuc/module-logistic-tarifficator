/**
 * todo: резкое исчезание строк
 */

/* Получение актуального курса валют */
import './form/setExchangeRate.js';

/* Подписка на изменение фильтров */
/* Синхронизация фильтров */
/* Обновление таблицы */
import './form/changeForm.js';


/* Подписка на выбор строк */
/* Изменение фильтров */
/* Обновление таблицы */
import './table/selectRow.js';
import './table/selectDropOffer.js';

// import './action/updateTable.js';
// import './action/updateSummationForm.js';
// import {sendFormOnLoad} from './action/sendFormOnLoad.js';
// import {fetchAndUpdateExchangeRate} from "./action/getExchangeRate.js";
//
// // Listener
// import "./conditions/filterSync.js";
// import "./conditions/selectDropOffer.js";
// import "./conditions/changeDropName.js";
// import "./conditions/hideDropRows.js";
// import {handleRowSelection} from './listener/listenerTable.js';
// import {handleFormChanges} from "./listener/listenerForm.js";


// Вызываем функции при загрузке страницы
// document.addEventListener('DOMContentLoaded', function () {
//     sendFormOnLoad(); // Отправка данных всех форм при загрузке
//
//     handleFormChanges(); // Подписка на изменение форм (select)
//     handleRowSelection(); // Подписка на выбор строк (row)
//
//     fetchAndUpdateExchangeRate(); // Обновление курса
// });