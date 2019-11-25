<?php
include('../Helpers/headCode.php');

$idAnime = $_GET['id'];
$idUsuario = datosUsuario('id');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valoracion = $_POST['valoracion-select'];
	valorarAnime($idAnime, $idUsuario, $valoracion);
}

include_once "template/menu.php";
$anime = mostrarPeliculaOSerie($_GET['id']);
$valoraciones = cargarValoracionesDeUnAnime($_GET['id']);
?>

<!-- 
**********************************************
** FICHA DE UNA PELÍCULA O SERIE
**********************************************
-->
<?php include_once "template/breadcrumb.php"; ?>
<header class="text-center cabecerasPaginas">
	<h1 class="texto-animado"><span><?= $anime->nombre ?></span></h1>
	<hr class="hrPersonalizado">
</header>
<main class="container mt-5">
	<!-- Page Content -->
	<div class="row mt-5">
		<?php include_once "template/sidebar.php"; ?>
		<!-- /.col-lg-3 -->
		<div class="col-lg-9">
			<!-- CONTENIDO DE LA FICHA DEL ANIME -->
			<div class="row">
				<div class="card card-ficha-anime mt-4">
					<img class="card-img-top img-fluid" src="<?= $anime->imagen ?>" alt="">
					<div class="card-body row">
						<div class="col-8 pr-5">
							<h3 class="card-title"><?= utf8_encode($anime->nombre) ?></h3>
							<p class="card-text"><?= utf8_encode($anime->descripcion) ?></p>					
						</div>
						<div class="col-4 border-left">
							<!--Si hay un usuario iniciado podra valorar-->
							<?php if (isset($_SESSION['usuario']) && canValorate($idAnime, $idUsuario)) { ?>
								<form class="mb-5" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);echo "?id=$anime->id"?>" method="POST">
									<select class="browser-default custom-select" id="valoracion-select" name="valoracion-select">
										<option selected>★ Selecciona una puntuación</option>
										<option value="1">★ 1 Pésimo</option>
										<option value="2">★ 2 Horrible</option>
										<option value="3">★ 3 Muy malo</option>
										<option value="4">★ 4 Malo</option>
										<option value="5">★ 5 Promedio</option>
										<option value="6">★ 6 Bien</option>
										<option value="7">★ 7 Bueno</option>
										<option value="8">★ 8 Muy bueno</option>
										<option value="9">★ 9 Genial</option>
										<option value="10">★ 10 Obra maestra</option>
									</select>
									<button type="submit" class="btn btn-warning col-12 mt-2">Enviar puntuación</button>
								</form>
							<?php }?>

							<span>Valoración de la gente:</span><br>
							<?php echo calcularValoracionMedia($valoraciones); ?>
						</div>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.col-lg-9 -->
	</div><!-- /.row -->
</div><!-- /.container -->
</main>

<?php include_once "template/footer.php" ?>