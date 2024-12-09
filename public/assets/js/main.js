// Action
import './action/ajax.js';
import './action/updateTable.js';
import './action/updateSummationForm.js';
import {sendFormOnLoad} from './action/sendFormOnLoad.js';
import {fetchAndUpdateExchangeRate} from "./action/getExchangeRate.js";

import './conditions/containerOwner.js';
import './conditions/containerType.js';
import './conditions/terminalValue.js';
import './conditions/destinationValue.js';

// Listener
import {handleRowSelection} from './listener/listenerTable.js';
import {handleFormChanges} from "./listener/listenerForm.js";
import {checkSeaResultsSelection} from "./listener/seaResultsSelection.js";

// Вызываем функции при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    sendFormOnLoad(); // Отправка данных всех форм при загрузке

    handleFormChanges(); // Подписка на изменение форм (select)
    handleRowSelection(); // Подписка на выбор строк (row)
    checkSeaResultsSelection(); // Доп. подписка на выделенную строку во Фрахте

    fetchAndUpdateExchangeRate(); // Обновление курса
});