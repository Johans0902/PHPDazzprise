<?php require_once "controller/config/conexion.php";
if(!isset($_SESSION)){
    session_start();
    if(isset($_SESSION["mensajeCompra"])){
        echo '<h1 id="message">'.$_SESSION["mensajeCompra"].'</h1>';
        unset($_SESSION['mensajeCompra']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <title>Dazzprise</title>

    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
</head>
<body>
<button Onclick="Rcarrito()" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></button>
    
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <img src="assets/img/LogoDAZZPRISE1.png" width="20%" a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
  
          <a href="#" class="nav-link text-info" category="all">Todos</a>
<?php
    $query = mysqli_query($conexion, "SELECT * FROM categorias");
      while ($data = mysqli_fetch_assoc($query)) { 
?>

<?php } ?>
    <ul class="navbar-nav">
        <div class="dropdown">
     <!-- <a href="#"  class="nav-link dropdown-item" category="all">Todo</a> -->
    <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categoria</a>
    <ul class="dropdown-menu">
      
<?php
    $query = mysqli_query($conexion, "SELECT * FROM categorias");
      while ($data = mysqli_fetch_assoc($query)) { ?>
        <a href="#" class="nav-link" category="<?php echo $data['categoria']; 
?>"><?php echo $data['categoria']; ?></a>
<?php } 

?>
            </ul>
        </div>                   
    </div>
</div>
    <?php if(isset($_SESSION["usuario"])){ ?>
        <button class="btn btn-red" Onclick="Rperfil()"> Perfil </button>  
        <a class="btn btn-red" href="/controller/salir.php"> Cerrar sesión </a>    
    <?php }else{ ?>
        <button class="btn btn-red" Onclick="Rregistrar()"> Registrar </button>    
        <button class="btn btn-red" Onclick="Rlogin()"> Login </button>  
    <?php } ?>
      
            </nav>
        </div>
    </body>
</html>
    <header class="bg.dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Aqui todo lo hacemos con amor</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
          while ($data = mysqli_fetch_assoc($query)) { ?>
         <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
                  <div class="card h-100">
                        
               <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                               
                <img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
                              
                                <div class="card-body p-4">
         <div class="text-center">
                                      
          <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
         <p><?php echo $data['descripcion']; ?></p>
                     <div class="d-flex justify-content-center small text-warning mb-2">
                          <div class="bi-star-fill"></div>
                         <div class="bi-star-fill"></div>
                         <div class="bi-star-fill"></div>
                         <div class="bi-star-fill"></div>
                         <div class="bi-star-fill"></div>
                     </div>
                  <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal'] ?></span>
<?php echo $data['precio_rebajado'] ?>
                                    </div>
                                </div>
                             
           <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                 <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
                     </div>
               </div>
          </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Dazzprise</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/funciones.js?001"></script>

</body>



</html>

<?