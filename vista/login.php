<!DOCTYPE html>
<html lang="en">
<?php 
include '../controller/config/conexion.php';
include '../modelo/loginModelo.php';
include '../controller/loginController.php';

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
    
    <title>Iniciar Sesión</title>
    <img src="../assets/img/LogoDAZZPRISE2.png" width="20%" a class="navbar-brand" href="#"></a>
</head>
<link rel="stylesheet" href="../assets/css/login.css">
<body>

    <body background="assets/img/Pastel.jpg" width:100%>
        <center>
            <form action="../controller/loginController.php" method="POST">
                <input type="text" name="usuario" placeholder="digite usuario">
                <br>
                <input type="password" name="clave" placeholder="digite contraseña">
                <br><br>
                <button type="submit">entrar</button>
            </form>
        </center>
    </body>

</html>

<script src="assets/js/funciones.js"></script>