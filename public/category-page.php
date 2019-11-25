<?php
include('../Helpers/headCode.php');
include_once "template/menu.php";
$cat = mostrarCategoria($_GET['id']);
$peliculasSeries = cargarPysDeCategoria($_GET['id']);
?>

<!-- 
**********************************************
** PÁGINA PELÍCULAS FILTRADAS POR CATEGORÍAS
**********************************************
-->
<?php include_once "template/breadcrumb.php"; ?>
<header class="text-center cabecerasPaginas">
    <h1 class="texto-animado"><span><?= utf8_encode($cat->nombre) ?></span></h1>
    <hr class="hrPersonalizado">
</header>
<main class="container mt-5">
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php include_once "template/sidebar.php"; ?>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9">
                <!-- CAJAS DE LOS ANIMES Y SERIES DE LA CATEGORÍA EN CONCRETO -->
                <div class="row">
                    <?php include_once "template/template-cajas-animes-categoria.php"; ?>
                </div><!-- /.row -->
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>

<?php require 'template/footer.php'; ?>
