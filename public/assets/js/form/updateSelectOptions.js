import {fetchOptionData} from "../api/form/options.js";

export async function updateSelectOptions(formId, sourceSelect, targetSelect) {
    const sourceElement = document.querySelector(`#${formId} select[name="${sourceSelect}"]`);
    const targetElement = document.querySelector(`#${formId} select[name="${targetSelect}"]`);

    if (!sourceElement || !targetElement) {
        return;
    }

    try {
        // Получаем данные для обновления
        const data = await fetchOptionData(formId, sourceSelect, sourceElement.value, targetSelect);

        if (!data || !Array.isArray(data.options)) {
            console.error('Invalid data structure:', data);
            return;
        }

        // Сохраняем текущее выбранное значение
        const currentValue = targetElement.value;

        // Очищаем старые опции в целевом select
        targetElement.innerHTML = `
            <option value="">
                Выбрать
            </option>
        `;

        let isValuePreserved = false;

        // Добавляем новые опции в целевой select
        data.options.forEach(option => {
            if (!option) {
                return;
            }

            const newOption = document.createElement('option');
            newOption.value = option.value || option; // Предполагается, что `option` может быть объектом или строкой
            newOption.textContent = option.text || option; // Текст опции

            // Проверяем, совпадает ли новая опция с текущим значением
            if (newOption.value === currentValue) {
                newOption.selected = true;
                isValuePreserved = true;
            }

            targetElement.appendChild(newOption);
        });

        // Если текущее значение отсутствует в новом списке, сбрасываем выбор
        if (!isValuePreserved) {
            targetElement.value = "";
        }
    } catch (error) {
        console.error('Error updating select options:', error);
    }
}
