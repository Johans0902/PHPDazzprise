<?php   
        if (isset($_POST)) {
            if(!isset($_SESSION)){
                session_start();
                $para      = $_SESSION['usuario'];
                $titulo    = 'Compra exitosa';
                $mensaje   = 'La compra de los productos ha sido exitosa';
                $cabeceras = 'From: dazzprize@dazzprize.com' . "\r\n" .
                            'Reply-To: dazzprize@dazzprize.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
    
                mail($para, $titulo, $mensaje, $cabeceras);
                $_SESSION['mensajeCompra'] = "Su compra ha sido exitosa, revise su direccion de correo electronico";
                header("Location: /index.php");
                exit();
            }
            

        }

?>

    

