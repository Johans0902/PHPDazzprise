<?php
    function loginController() {   
        if (!empty($_POST)) {
            if ($_POST['usuario'] == 'admin1@gmail.com' && $_POST['clave'] == 'admin') {
                session_start();
                $_SESSION["DATA"] = $_POST;
                header("Location: vista/admin/index.php");
                exit();
                }
        }
    }

?>