<?php
    require_once "config/conexion.php";
   
        if (isset($_GET)) {
            if (!empty($_GET['accion']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                if ($_GET['accion'] == 'pro') {
                    $query = mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");
                    if ($query) {
                        header('Location: http://localhost/vista/admin/productos.php',TRUE);
                    }
                }
                if ($_GET['accion'] == 'cli') {
                    $query = mysqli_query($conexion, "DELETE FROM categorias WHERE id = $id");
                    if ($query) {
                        header('Location: categorias.php');
                    }
                }
            }
        }
    

    function productos(){
        if (isset($_POST)) {
            if (!empty($_POST)) {
                $nombre = $_POST['nombre'];
                $cantidad = $_POST['cantidad'];
                $descripcion = $_POST['descripcion'];
                $p_normal = $_POST['p_normal'];
                $p_rebajado = $_POST['p_rebajado'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $categoria = $_POST['categoria'];
                $img = $_FILES['foto'];
                $name = $img['name'];
                $tmpname = $img['tmp_name'];
                $fecha = date("YmdHis");
                $foto = $fecha . ".jpg";
                $destino = "../assets/img/" . $foto;
                $query = mysqli_query($conexion, "INSERT INTO productos(nombre, descripcion, precio_normal, precio_rebajado, marca, modelo, cantidad, imagen, id_categoria) VALUES ('$nombre', '$descripcion', '$p_normal', '$p_rebajado', '$marca', '$modelo', $cantidad, '$foto', $categoria)");
                if ($query) {
                    if (move_uploaded_file($tmpname, $destino)) {
                        header('Location: productos.php');
                    }
                }
            }
        }
    }

    function indexAdmin() {
        session_start();
        var_dump($_SESSION);
        if (!empty($_SESSION['active'])) {
            header('location: productos.php');
        } else {
            
            require "config/conexion.php";
            if (!empty($_SESSION["DATA"])) {
               
                $alert = '';
                if (empty($_SESSION["DATA"]["usuario"]) || empty($_SESSION["DATA"]["clave"])) {
                    $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Ingrese usuario y contraseña
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                } else {
                   
                    $user = mysqli_real_escape_string($conexion, $_SESSION["DATA"]['usuario']);
                    $clave = md5(mysqli_real_escape_string($conexion, $_SESSION["DATA"]['clave']));
                    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$clave'");
                    mysqli_close($conexion);
                    $resultado = mysqli_num_rows($query);
                    if ($resultado > 0) {
                        $dato = mysqli_fetch_array($query);
                        $_SESSION['active'] = true;
                        $_SESSION['id'] = $dato['id'];
                        $_SESSION['nombre'] = $dato['nombre'];
                        $_SESSION['user'] = $dato['usuario'];
                        
                        header('Location: productos.php');
                    } else {
                        $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                Contraseña incorrecta
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                        session_destroy();
                    }
                }
            }
           
        }
    }
?>