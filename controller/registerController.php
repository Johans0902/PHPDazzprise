<?php
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $email= $_POST["email"];
        $telefono= $_POST["telefono"];
        $contraseña= $_POST["contraseña"];  
        
    
        if ($nombre&& $email && $telefono && $contraseña) {
            require_once "../modelo/userModelo.php";
                $modelo= new usuario();
                $modelo->setNombre($nombre);
                $modelo->setEmail($email);
                $modelo->setTelefono($telefono);
                $modelo->setPassword($contraseña);
               $success = $modelo->save();
            
                $success = $modelo->sendEmail();

                var_dump($success);

                //header("Location: /index.php");
        }
    }
}

?>
 


    