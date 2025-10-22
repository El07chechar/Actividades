const imagenPrincipal = document.getElementById('imagen-principal');
const miniaturas = document.querySelectorAll('.miniaturas img');
let indiceActual = 0;


miniaturas.forEach((mini, index) => {
    mini.addEventListener('click', () => {
        cambiarImagen(index);
    });
});


function cambiarImagen(index) {
    imagenPrincipal.src = miniaturas[index].src;
    miniaturas[indiceActual].classList.remove('activa');
    miniaturas[index].classList.add('activa');
    indiceActual = index;
}

miniaturas[0].classList.add('activa');

document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
        indiceActual = (indiceActual + 1) % miniaturas.length;
        cambiarImagen(indiceActual);
    } else if (e.key === 'ArrowLeft') {
        indiceActual = (indiceActual - 1 + miniaturas.length) % miniaturas.length;
        cambiarImagen(indiceActual);
    }
});