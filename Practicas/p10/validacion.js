function validarFormulario() {
    // Obtener valores del formulario
    var nombre = document.getElementById('form-name').value.trim();
    var marca = document.getElementById('form-branch').value;
    var modelo = document.getElementById('form-model').value.trim();
    var precio = document.getElementById('form-price').value;
    var detalles = document.getElementById('form-details').value.trim();
    var unidades = document.getElementById('form-units').value;
    var imagen = document.getElementById('form-image').value.trim();

    // a. Validar nombre (requerido, 100 caracteres o menos)
    if (nombre === '') {
        alert('El nombre es requerido');
        return false;
    }
    if (nombre.length > 100) {
        alert('El nombre debe tener 100 caracteres o menos');
        return false;
    }

    // b. Validar marca (requerida, de lista)
    if (marca === '') {
        alert('La marca es requerida');
        return false;
    }

    // c. Validar modelo (requerido, alfanumérico, 25 caracteres o menos)
    if (modelo === '') {
        alert('El modelo es requerido');
        return false;
    }
    var alfanumerico = /^[a-zA-Z0-9 ]+$/;
    if (!alfanumerico.test(modelo)) {
        alert('El modelo debe ser alfanumérico');
        return false;
    }
    if (modelo.length > 25) {
        alert('El modelo debe tener 25 caracteres o menos');
        return false;
    }

    // d. Validar precio (requerido, mayor a 99.99)
    if (precio === '') {
        alert('El precio es requerido');
        return false;
    }
    if (parseFloat(precio) <= 99.99) {
        alert('El precio debe ser mayor a 99.99');
        return false;
    }

    // e. Validar detalles (opcional, 250 caracteres o menos)
    if (detalles.length > 250) {
        alert('Los detalles deben tener 250 caracteres o menos');
        return false;
    }

    // f. Validar unidades (requerido, mayor o igual a 0)
    if (unidades === '') {
        alert('Las unidades son requeridas');
        return false;
    }
    if (parseInt(unidades) < 0) {
        alert('Las unidades deben ser mayor o igual a 0');
        return false;
    }

    // g. Imagen por defecto si está vacía
    if (imagen === '') {
        document.getElementById('form-image').value = 'img/default.png';
    }

    return true;
}