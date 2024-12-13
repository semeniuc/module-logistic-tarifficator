// Action
import './action/ajax.js';
import './action/updateTable.js';
import './action/updateSummationForm.js';
import {sendFormOnLoad} from './action/sendFormOnLoad.js';
import {fetchAndUpdateExchangeRate} from "./action/getExchangeRate.js";

// Listener
import "./conditions/filterSync.js";
import "./conditions/selectDropOffer.js";
import "./conditions/changeDropName.js";
import {handleRowSelection} from './listener/listenerTable.js';
import {handleFormChanges} from "./listener/listenerForm.js";


// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    sendFormOnLoad(); // Отправка данных всех форм при загрузке

    handleFormChanges(); // Подписка на изменение форм (select)
    handleRowSelection(); // Подписка на выбор строк (row)

    fetchAndUpdateExchangeRate(); // Обновление курса
});