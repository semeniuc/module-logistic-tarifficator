/**
 * Обновляет содержимое <select> элементa уникальными значениями
 *
 * @param {string} selectId - ID селекта, который нужно обновить
 * @param {Array} options - Массив объектов с данными для опций (ожидается формат id, name)
 */
export function updateSelectOptions(selectId, options) {
    const selectElement = document.querySelector('#' + selectId);

    if (!selectElement || !Array.isArray(options)) {
        console.error('Invalid arguments for ' + selectId);
        return;
    }

    // Очищаем старые опции
    selectElement.innerHTML = `
        <option value="">
            Выбрать
        </option>
    `;

    // Добавляем новые опции
    options.forEach(option => {
        const newOption = document.createElement('option');
        newOption.value = option;
        newOption.textContent = option;
        selectElement.appendChild(newOption);
    });
}
