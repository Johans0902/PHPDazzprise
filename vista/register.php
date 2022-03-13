<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dazzprise</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/resgistro.css">

  </head>
  <body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Crear Cuenta</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="/card/index.php" method="POST">
    <input name="nombre" type="nombre" placeholder="Nombre">
    <input name="email" type="text" placeholder="Ingresa tu email">
    <input name="telefono" type="text" placeholder="Ingresa tu telefono">
    <input name="contraseña" type="password" placeholder="Ingresa tu contraseña">

      <input type="submit" value="Submit">
    </form>

  </body>
</html>
