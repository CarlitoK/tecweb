const IMAGEN_POR_DEFECTO = 'https://via.placeholder.com/300x300?text=Producto';

document.addEventListener('DOMContentLoaded', function() {
  const formulario = document.getElementById('formularioTenis');
  
  formulario.addEventListener('submit', function(event) {
    event.preventDefault();
    
    if (validarFormulario()) {
      const inputImagen = document.getElementById('form-image');
      if (!inputImagen.value.trim()) {
        inputImagen.value = IMAGEN_POR_DEFECTO;
      }
      formulario.submit();
    }
  });
});

function validarFormulario() {
  limpiarErrores();
  
  const nombre = document.getElementById('form-name').value.trim();
  const marca = document.getElementById('form-branch').value;
  const modelo = document.getElementById('form-model').value.trim();
  const precio = document.getElementById('form-price').value;
  const detalles = document.getElementById('form-details').value.trim();
  const unidades = document.getElementById('form-units').value;
  
  let esValido = true;
  
  if (!nombre) {
    mostrarError('form-name', 'El nombre es requerido');
    esValido = false;
  }
  
  if (!marca) {
    mostrarError('form-branch', 'Debe seleccionar una marca');
    esValido = false;
  }
  
  if (!modelo || !esAlfanumerico(modelo)) {
    mostrarError('form-model', 'El modelo es requerido y debe ser alfanumérico');
    esValido = false;
  }
  
  if (!precio || parseFloat(precio) <= 99.99) {
    mostrarError('form-price', 'El precio debe ser mayor a 99.99');
    esValido = false;
  }
  
  if (unidades === '' || parseInt(unidades) < 0) {
    mostrarError('form-units', 'Las unidades son requeridas y no pueden ser negativas');
    esValido = false;
  }
  
  return esValido;
}

function esAlfanumerico(texto) {
  return /^[a-zA-Z0-9\s\-]+$/.test(texto);
}

function mostrarError(idElemento, mensaje) {
  const elemento = document.getElementById(idElemento);
  const contenedor = elemento.parentElement;
  
  const error = document.createElement('span');
  error.className = 'error-mensaje';
  error.textContent = mensaje;
  error.style.color = 'red';
  error.style.fontSize = '12px';
  error.style.display = 'block';
  error.style.marginTop = '5px';
  
  elemento.style.borderColor = 'red';
  elemento.style.backgroundColor = '#ffe6e6';
  
  contenedor.appendChild(error);
}

function limpiarErrores() {
  document.querySelectorAll('input, textarea, select').forEach(input => {
    input.style.borderColor = '';
    input.style.backgroundColor = '';
  });
  
  document.querySelectorAll('.error-mensaje').forEach(error => error.remove());
}