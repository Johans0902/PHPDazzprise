function Rlogin(){
    window.location.replace("http://localhost/vista/login.php")
}
function Rregistrar(){
    window.location.replace("http://localhost/vista/register.php")
}

function Rcarrito(){
    window.location.replace("http://localhost/vista/carrito.php")
}
function Rperfil(){
    window.location.replace("http://localhost/vista/perfil.php")
}
$(document).ready(function () {
    setTimeout(function(){
        $('#message').remove();
    },3000);
})
