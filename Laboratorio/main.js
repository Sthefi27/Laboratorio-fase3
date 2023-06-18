const formulario = document.getElementById('formulario');
const nombre =document.getElementById('nombre');
const primerApellido = document.getElementById('primerApellido');
const segundoApellido = document.getElementById('segundoApellido');
const email = document.getElementById('email');
const login = document.getElementById('login');
const password = document.getElementById('password');

formulario.addEventListener('submit', (event) => {
    ValidarInputs();
    event.preventDefault ();
});

function ValidarInputs () {
if(nombre.value.trim() === '' || primerApellido.value.trim() === '' || segundoApellido.value.trim() === '' || email.value.trim() === '' || login.value.trim() === '' || password.value.trim() === '') {
    alert ("Rellene los campos requeridos.") ;
} else if(!validaremail(email.value)){
    alert ("Ingrese un email válido");    
} else if (!validarcontraseña(password.value)) {
    alert ("La contraseña debe tener entre 4 y 8 caracteres");
} else {
    alert ("Formulario enviado correctamente");
    formulario.submit();
}
}
function validaremail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}   
 function validarcontraseña(password) {
    return password.length >= 4 && password.length <= 8;
 }
