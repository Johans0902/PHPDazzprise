<!DOCTYPE html>
<html lang="en">
<?php 
require_once "../modelo/userModelo.php";
if(!isset($_SESSION)){
    session_start();
 
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  
    
    <title>Iniciar Sesión</title>
    <img src="../assets/img/LogoDAZZPRISE2.png" width="20%" a class="navbar-brand" href="#"></a>
</head>
<link rel="stylesheet" href="/assets/css/login.css">
<body>
    
    <body background="../assets/img/Pastel.jpg" width:100%>
        <center>
        <?php
        $usuario = new usuario();
        $exists = $usuario->find($_SESSION["usuario"]);
        if($exists){
        ?>
            <form action="../controller/perfilController.php?id=<?php echo $usuario->getId(); ?>" method="POST">
                <h1>Datos del perfil</h1>
                <input name="nombre" type="nombre" placeholder="Nombre" value="<?php echo $usuario->getNombre()?>" required>
                <input name="email" type="text" placeholder="Ingresa tu email" value="<?php echo $usuario->getEmail()?>" required>
                <input name="telefono" type="text" placeholder="Ingresa tu telefono" value="<?php echo $usuario->getTelefono()?>" required>
                <input name="contraseña" type="password" placeholder="Ingresa tu contraseña" value="<?php echo $usuario->getPassword()?>" required>
                <button type="submit">Actualizar Datos</button>
                <button Onclick=' window.location.replace("http://localhost/")'>Volver a la pagina principal</button>
            </form>
        <?php
        }else{
            header("Location: /index.php");
        }
        ?>
                
        </center>
    </body>

</html>

