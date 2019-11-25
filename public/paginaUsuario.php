<!-- Zaira Bravo Sánchez - 2nd DAW -->

<!-- *********** CARGAMOS EL MENU CON EL HEAD *********** -->
<?php
include('../Helpers/headCode.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$imgPerfil = $_POST['fotoPerfil'];
	subirImagen(datosUsuario('id'), $imgPerfil);
}
$listaDeseos = sacarListaDeseos(datosUsuario('id'));

include_once "template/menu.php";

?>
<!-- 
**********************************
** PÁGINA DEL USUARIO
**********************************
-->
<header class="text-center cabecerasPaginas">
	<h1 class="texto-animado"><span><?= datosUsuario('usuario'); ?></span></h1>
	<hr class="hrPersonalizado">
</header>
<main class="container mt-5">
	<div class="row mt-5">
		<div class="col-lg-4">
			<div class="card mt-4">
				<img class="card-img-top img-fluid" src="<?= datosUsuario('foto_perfil'); ?>" alt="imagen Perfil">				
				<div class="card-body">
					<h2 class="card-title">Datos personales</h2>
					<p class="card-text"><strong>Nombre:</strong> <?= utf8_encode(datosUsuario('nombre')); ?></p>
					<p class="card-text"><strong>Apellidos:</strong> <?= utf8_encode(datosUsuario('apellidos')); ?></p>
					<p class="card-text"><strong>Email:</strong> <?= utf8_encode(datosUsuario('email')); ?></p>
				</div>
				<div class="card-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						<h3 class="card-title">Cambiar foto de perfil</h3>
						<div class="form-group"> 
							<input class="form-control" id="fotoPerfil" name="fotoPerfil" type="text" placeholder="Url Imagen" required>        
						</div>
						<input class="btn btn-primary col-12 p-2" type="submit" value="Subir imagen">
					</form>
				</div>
			</div>
		</div>	
		<div class="col-lg-8">
			<div class="card mt-4">
				<div class="card-body">
					<h2 class="card-title">Animes que sigues:</h2>
					<?php foreach($listaDeseos as $lineaLista) { ?>
						<span><?= utf8_encode($lineaLista) ?></span>
					<?php } ?>
				</div>
			</div>
		</div>	
	</div>
</main>

<?php include_once "template/footer.php";