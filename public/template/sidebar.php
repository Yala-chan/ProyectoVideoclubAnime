<aside class="col-lg-3">
	<h2 class="text-white">Categorías</h2>
	<div class="list-group">
		<?php
		$categorias = mostrarCategorias();
		foreach($categorias as $cat){ ?>
			<a href='category-page.php?id=<?= $cat->id ?>' class="list-group-item list-group-item-action"><?= utf8_encode($cat->nombre) ?></a>
		<?php }; ?>
	</div>
</aside>