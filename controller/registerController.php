<?php
 function registrar() {
    require '../config/conexion.php';

    $message = '';
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $contraseña = $_POST['contraseña'];
        if (empty($nombre) || empty($email) || empty($telefono) ||empty($contraseña)) {
            $msg = "Todo los campos son obligatorios";
        }else if(clave != $confirmar){
            $msg = "Las contraseñas no coinciden";
        }else{
           $data = $this->model->registrarUsuario($nombre, $email, $contraseña);
           if ($data == "ok") {
               $msg = "Empleado registrado con exito";
           }else{
               $msg = "Error al registar empleado";
           }
        
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
 }
?>