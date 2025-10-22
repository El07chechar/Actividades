const items = document.querySelectorAll('.item');
const zonas = document.querySelectorAll('.zona');


items.forEach(item => {
    item.addEventListener('dragstart', handleDragStart);
});


zonas.forEach(zona => {
    zona.addEventListener('dragover', handleDragOver);
    zona.addEventListener('drop', handleDrop);
    zona.addEventListener('dragenter', () => zona.classList.add('destino-activo'));
    zona.addEventListener('dragleave', () => zona.classList.remove('destino-activo'));
});


function handleDragStart(e) {
    e.dataTransfer.setData('text/plain', this.id);
    e.dataTransfer.effectAllowed = 'move';
}

function handleDragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
}

function handleDrop(e) {
    e.preventDefault();
    const id = e.dataTransfer.getData('text/plain');
    const elemento = document.getElementById(id);
    this.appendChild(elemento);
    this.classList.remove('destino-activo');
}