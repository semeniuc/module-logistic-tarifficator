import {fetchOptionData} from "../api/form/options.js";

/**
 * Обновляет содержимое <select> элементa уникальными значениями
 * @param {string} formId - ID формы
 * @param {string} sourceSelect - Название исходного <select>
 * @param {string} targetSelect - Название целевого <select>
 */
export async function updateSelectOptions(formId, sourceSelect, targetSelect) {
    const sourceElement = document.querySelector(`#${formId} select[name="${sourceSelect}"]`);
    const targetElement = document.querySelector(`#${formId} select[name="${targetSelect}"]`);

    if (!sourceElement || !sourceElement.value || !targetElement) {
        // console.error('Invalid arguments for update options: ' + formId + ' - ' + targetSelect);
        return;
    }

    try {
        // Получаем данные для обновления
        const data = await fetchOptionData(formId, sourceSelect, sourceElement.value, targetSelect);

        if (!data || !Array.isArray(data.options)) {
            console.error('Invalid data structure:', data);
            return;
        }

        // Очищаем старые опции в целевом select
        targetElement.innerHTML = `
            <option value="">
                Выбрать
            </option>
        `;

        // Добавляем новые опции в целевой select
        data.options.forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option.value || option; // Предполагается, что `option` может быть объектом или строкой
            newOption.textContent = option.text || option; // Текст опции
            targetElement.appendChild(newOption);
        });
    } catch (error) {
        console.error('Error updating select options:', error);
    }
}