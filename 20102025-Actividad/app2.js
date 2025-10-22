    const input = document.getElementById('usuario');
    const mensaje = document.getElementById('mensaje');
    const form = document.getElementById('formulario');

    input.addEventListener('input', function() {
      if (this.value.length < 5) {
        mensaje.textContent = 'Demasiado corto';
        mensaje.style.color = 'red';
      } else {
        mensaje.textContent = '¡Válido!';
        mensaje.style.color = 'green';
      }
    });

    form.addEventListener('submit', function(e) {
      if (input.value.length < 5) {
        e.preventDefault();
        alert('Nombre de usuario inválido');
      }
    });