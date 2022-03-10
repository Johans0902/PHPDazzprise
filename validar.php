<?php

session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$query = "SELECT COUNT(*) as contar from usuarios where = '$usuario' and clave = '$clave'";
$consulta = mysql_query($conexion,$query);
$array = mysql_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION["username"] = $usuario;
    header("location: ../index.php");
}else{
    echo "Datos incorrectos";
}

?>