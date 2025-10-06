
function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

function holaMundo(){
    var holaMundo = "Hola Mundo";
    var div3 = document.getElementById('hola Mundo');
    div3.innerHTML = '<h3>Hola Mundo</h3>';
}

function variablesV(){
    var nombre = "Juan";
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div4 = document.getElementById("nombre");
    var div5 = document.getElementById("edad");
    var div6 = document.getElementById("altura");
    var div7 = document.getElementById("casado");
    div4.innerHTML = '<h3> Nombre: '+nombre+'</h3>';
    div5.innerHTML = '<h3> Edad: '+edad+'</h3>';
    div6.innerHTML = '<h3> Altura: '+altura+'</h3>';
    div7.innerHTML = '<h3> Casado: '+casado+'</h3>';



}
