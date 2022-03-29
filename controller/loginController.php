<?php   
        if (isset($_POST)) {
            if (!empty($_POST)) {
                $usuario = $_POST['usuario'];
                $clave= $_POST['clave'];
                if(empty($usuario) || empty($clave)){
                    echo '<div clas="alert alert-danger">nombre de usuario o contraseña esta vacio</div>';
                }else{
                    if ($usuario&& $clave) {
                        if ($usuario == 'admin1@gmail.com' && $clave == 'admin') {
                            session_destroy();
                                session_start();
                            $_SESSION["DATA"] = $_POST;
                            header("Location: http://localhost/vista/admin/index.php");
                            exit();
                        }
                        require_once "../modelo/loginModelo.php";
                            $modelo= new login();
                            $modelo->setUsuario($usuario);
                            $modelo->setClave($clave);
                            $exist = $modelo->loginUser();
                            
                            if ($exist) {
                                session_destroy();
                                session_start();
                                $_SESSION['usuario'] = $usuario;
                                header("Location: /index.php");
                                exit();
                            }else{
                                echo '<div clas="alert alert-danger">Usuario no existe</div>';
                            }
                            
                    }
                }
               
            }

        }

?>

    

