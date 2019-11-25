<?php
include('../Helpers/headCode.php');

$mensaje = añadirNuevosAnimes();

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
<body id="content-new-anime">
    <main class="text-center p-3 bg-secondary text-white col-4 m-auto">
        <h1>Añadir nuevo anime</h1>
        <hr>
        <?php if (isset($correcto)) { ?>
            <p class="alert-success alert mt-3" role="alert"><?= $correcto ?></p>
            <hr>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group"> 
                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>        
            </div>
            <div class="form-group"> 
                <textarea class="form-control" id="descripcion" name="descripcion" type="text" placeholder="Descripción" required></textarea>       
            </div>
            <div class="form-group">
                <textarea class="form-control" id="descripcionCorta" name="descripcionCorta" type="text" placeholder="Descripción Corta" required></textarea>
            </div>
            <div class="form-group">    
                <input class="form-control" id="urlImagen" name="urlImagen" type="text" placeholder="Url imágen" required>
            </div>
            <input class="btn btn-primary col-12 p-2" type="submit" value="Añadir">
        </form>
        <?php if (isset($error)) echo "<p class=\"alert-danger alert mt-3\" role=\"alert\">$error"?></p>
        <hr>
        <a href="index.php"><button type="button" class="btn btn-secondary">Volver a inicio</button></a>
    </main> 
</body>