<?php
include('../Helpers/headCode.php');

$mensaje = comprobarConexionRegistro();

//Dependiendo del mensaje dado por la funcion lo guardara en una variable u otra
if (strpos($mensaje, "ya existe")) {
    $error = $mensaje;
} elseif (strstr($mensaje, 'No')) {
    $error = $mensaje;
} else {
    $correcto = $mensaje;
}

include_once "template/head.php"; //Incluye el head del html
?>

<!-- 
**********************************
** FORM DE REGISTRO DE USUARIO
**********************************
-->
<body id="content-login">
    <main class="text-center p-3 bg-secondary text-white col-4 m-auto">
        <h1>Registro</h1>
        <hr>
        <?php if (isset($correcto)) { ?>
            <p class="alert-success alert mt-3" role="alert"><?= $correcto ?></p>
            <a class="btn btn-success col-12" href="login.php" role="button">Logueate</a>
            <hr>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group"> 
                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario" required>        
            </div>
            <div class="form-group"> 
                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>        
            </div>
            <div class="form-group"> 
                <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Apellidos" required>        
            </div>
            <div class="form-group">
                <input class="form-control" id="email" name="email" type="email" placeholder="Email" required>        
            </div>
            <div class="form-group">    
                <input class="form-control" id="clave" name="clave" type="password" placeholder="Contraseña" required>
            </div>
            <input class="btn btn-primary col-12 p-2" type="submit" value="Registrarse">
        </form>
        <?php if (isset($error)) echo "<p class=\"alert-danger alert mt-3\" role=\"alert\">$error"?></p>
        <hr>
        <small>¿Tienes cuenta?</small>
        <a class="btn btn-success" href="login.php" role="button">Logueate</a>
        <hr>
        <a href="index.php"><button type="button" class="btn btn-secondary">Volver a inicio</button></a>
    </main> 
</body>