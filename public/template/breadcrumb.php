<?php 
$cat = mostrarCategoria($_GET['id']); 
$anime = mostrarPeliculaOSerie($_GET['id']);
$url = $_SERVER['REQUEST_URI'];

/* **********************
** Si en la url detecta que es una ficha de una pelicula o serie (anime) mostrara una url diferente
** a si es otra página
** **********************/
if (strpos($url, 'ficha_peliculaSerie.php') !== false) { ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= utf8_encode($anime->nombre) ?></li>
		</ol>
	</nav>  

<?php } else { ?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= utf8_encode($cat->nombre) ?></li>
		</ol>
	</nav> 
<?php } ?>