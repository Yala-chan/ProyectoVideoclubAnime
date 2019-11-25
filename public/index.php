<!-- Zaira Bravo Sánchez - 2nd DAW -->

<!-- *********** CARGAMOS EL MENU CON EL HEAD *********** -->
<?php
include('../Helpers/headCode.php');
include_once "template/menu.php";

?>
<!-- 
**********************************
** PÁGINA PRINCIPAL
**********************************
-->
<header class="text-center cabecerasPaginas">
	<h1 class="texto-animado"><span>VideoAnime</span></h1>
	<hr class="hrPersonalizado">
	<p class="text-white mt-3">¡Guarda los animes que estes viendo o te gustaría ver para tener tu propia lista de animes!</p>
</header>
<main class="container mt-5">
	<!-- Page Content -->
	<div class="row mt-5">
		<?php include_once "template/sidebar.php"; ?>
		<!-- /.col-lg-3 -->
		<div class="col-lg-9">
			<!-- CAJAS DE LOS ANIMES Y SERIES -->
			<div class="row">
				<?php include_once "template/template-cajas-animes.php"; ?>
			</div><!-- /.row -->
		</div><!-- /.col-lg-9 -->
	</div><!-- /.row -->
</div><!-- /.container -->
</main>

<?php include_once "template/footer.php";