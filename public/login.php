<?php
include('../Helpers/headCode.php');

$error = comprobarConexionLogin();

include_once "template/head.php"; //Incluye el head del html
?>

<!-- 
**********************************
** FORM DE INICIO DE SESIÓN
**********************************
-->
<body id="content-login">
    <main class="text-center p-3 bg-secondary text-white col-3 m-auto">
        <h1>Iniciar sesion</h1>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group"> 
                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario" required>		
            </div>
            <div class="form-group">						
                <input class="form-control" id="clave" name="clave" type="password" placeholder="Contraseña" required>
            </div>
            <input class="btn btn-primary col-12 p-2" type="submit" value="Loguearse">
        </form>
        <?php if (isset($error)) echo "<p class=\"alert-danger alert mt-3\" role=\"alert\">$error" ?></p>
        <hr>
        <small>¿Has olvidado la contraseña?</small>
        <a class="btn btn-warning btn-sm" href="remember.php" role="button">Recordar contraseña</a>
        <hr>
        <small>¿No tienes cuenta?</small>
        <a class="btn btn-success" href="registro.php" role="button">Regístrate</a>
        <hr>
        <a href="index.php"><button type="button" class="btn btn-secondary">Volver a inicio</button></a>
    </main>	
</body>