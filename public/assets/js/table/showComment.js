export function showComments() {
    const commentIcons = document.querySelectorAll('.comment-icon');
    if (commentIcons.length === 0) {
        return;
    }

    const container = document.querySelector('.container');

    commentIcons.forEach(function (td) {
        let tooltip; // Переменная для хранения созданной подсказки

        td.addEventListener('mouseenter', function () {
            const tooltipText = this.getAttribute('data-title');
            if (!tooltipText) return; // Не создаем подсказку, если текста нет

            // Создание подсказки
            tooltip = document.createElement('div');
            tooltip.className = 'comment';
            tooltip.innerHTML = tooltipText;

            // Добавление подсказки в контейнер
            container.appendChild(tooltip);

            // Убедимся, что элемент виден
            tooltip.style.display = 'block';
            tooltip.style.visibility = 'hidden'; // Скрываем, чтобы не мелькнул при расчете

            // Используем setTimeout для отложенного расчета размеров
            setTimeout(() => {
                // Получаем размеры и положение спана
                const span = td.querySelector('span.icon'); // Найти span с классом 'icon'
                const spanRect = span.getBoundingClientRect(); // Позиция спана

                // Позиционирование подсказки слева от спана
                tooltip.style.left = spanRect.left - window.scrollX - tooltip.offsetWidth - 10 + 'px'; // Слева от спана
                tooltip.style.top = spanRect.top + window.scrollY + (spanRect.height / 2) - (tooltip.offsetHeight) + 'px'; // Центрирование по вертикали относительно спана

                // Сделаем элемент видимым после расчета
                tooltip.style.visibility = 'visible';
            }, 0); // Отложенный вызов на 0 мс для пересчета размеров

        });

        td.addEventListener('mouseleave', function () {
            if (tooltip) {
                tooltip.remove(); // Удаление подсказки при выходе мыши
                tooltip = null; // Очищаем переменную
            }
        });
    });
}
