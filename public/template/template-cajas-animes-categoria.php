<?php
$peliculasSeries = cargarPysDeCategoria($_GET['id']);

foreach($peliculasSeries as $anime){ ?>
	<div class="col-lg-4 col-md-6 mb-4">
		<div class="card h-100">
			<a href='ficha_peliculaSerie.php?id=<?= $anime->id ?>'><img class="card-img-top" src="<?= $anime->imagen ?>" alt=""></a>
			<div class="card-body">
				<h4 class="card-title">
					<a href='ficha_peliculaSerie.php?id=<?= $anime->id ?>'><?= utf8_encode($anime->nombre) ?></a>
				</h4>	
				<p class="card-text"><?= utf8_encode($anime->descripcion_corta) ?></p>
			</div>
			<div class="card-footer">
				<a href='ficha_peliculaSerie.php?id=<?= $anime->id ?>'><button type="button" class="btn btn-warning col-12 botonGeneral">Ver ficha</button></a>
			</div>
		</div>
	</div>
<?php }; ?>