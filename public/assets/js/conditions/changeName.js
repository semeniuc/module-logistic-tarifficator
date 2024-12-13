function updateContainerNameAndPod(selectedValue) {
    const nameText = selectedValue === 'soc' ? 'Аренда контейнера' : 'Drop off';
    const podText = selectedValue === 'soc' ? 'POL' : 'POD';

    // Обновляем элементы с классом container-dynamic-name
    document.querySelectorAll('.container-dynamic-name').forEach(element => {
        element.textContent = nameText;
    });

    // Обновляем элементы с классом container-dynamic-pod
    document.querySelectorAll('.container-dynamic-pod').forEach(element => {
        element.textContent = podText;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const dropContainerOwner = document.querySelector('#container-form select[name="containerOwner"]');
    const seaContainerOwner = document.querySelector('#sea-form select[name="containerOwner"]');

    if (dropContainerOwner) {
        dropContainerOwner.addEventListener('change', () => {
            updateContainerNameAndPod(dropContainerOwner.value);
        });
    }

    if (seaContainerOwner) {
        seaContainerOwner.addEventListener('change', () => {
            updateContainerNameAndPod(seaContainerOwner.value);
        });
    }
});
