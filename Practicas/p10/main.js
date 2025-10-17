const DEFAULT_IMAGE = 'img/default.png';

function validateForm(){
    // El nombre debe ser requerido y tener 100 caracteres o menos.
  const nombre = document.getElementById('nombre').value.trim();
  if(!nombre || nombre.length > 100){ 
    alert('Nombre requerido y máximo 100 caracteres'); 
    return false;
  }

  // La marca debe ser requerida y seleccionarse de una lista de opciones.
  const marca = document.getElementById('marca').value;
  if(!marca){ 
    alert('Selecciona una marca'); 
    return false; 
  }

  // El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
  const modelo = document.getElementById('modelo').value.trim();
  if(!modelo || modelo.length > 25 || !/^[A-Za-z0-9\s\-]+$/.test(modelo)){ // Validación alfanumérico con espacios y guiones
    alert('Modelo requerido: alfanumérico y máximo 25 caracteres'); 
    return false;
  }

  // El precio debe ser requerido y debe ser mayor a 99.99
  const precio = parseFloat(document.getElementById('precio').value);
  if(Number.isNaN(precio) || precio > 99.99){ 
    alert('Precio debe ser mayor a 99.99'); 
    return false; 
  }

  // Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
  const detalles = document.getElementById('detalles').value;
  if(detalles.length > 250){ 
    alert('Detalles máximo 250 caracteres'); 
    return false; 
  }

  // Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0.
  const unidades = parseInt(document.getElementById('unidades').value, 10);
  if(Number.isNaN(unidades) || unidades < 0){ 
    alert('Unidades debe ser un número mayor o igual a 0'); 
    return false; 
  }

  // La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la imagen por defecto.
  const imagen = document.getElementById('imagen');
  if(!imagen.value.trim()){
    imagen.value = DEFAULT_IMAGE; 
  }

  return true;
}

// Asociar la validación al evento submit del formulario
document.getElementById('form-producto').addEventListener('submit', function(evt){
  if(!validateForm()) evt.preventDefault();
});