<!-- *********** FOOTER WEB *********** -->
</body>
<footer class="page-footer font-small pt-4 text-white mt-5" style="background: #2c2c2c;">
	<div class="container-fluid text-center text-md-left">
		<div class="row">
			<div class="col-md-6 mt-md-0 mt-3">
				<img src="./imagenes/logo.png" alt="logo Footer" width="200px">
				<p>¡Tu historial de animes y valoraciones de estos los podras encontrar aquí!</p>

			</div>
			<hr class="clearfix w-100 d-md-none pb-3">

			<div class="col-md-3 mb-md-0 mb-3">
				<h5 class="text-uppercase">Categorías</h5>
				<ul class="list-unstyled row">
					<?php
					$categorias = mostrarCategorias();
					foreach($categorias as $cat){ ?>
						<li class="col-4">
							<a href='category-page.php?id=<?= $cat->id ?>'><?= utf8_encode($cat->nombre) ?></a>
						</li>
					<?php }; ?>
				</ul>
			</div>
			<div class="col-md-3 mb-md-0 mb-3">
				<h5 class="text-uppercase">Usuario</h5>
				<ul class="list-unstyled">
					<!--Si hay un usuario iniciado...-->
					<?php if (!isset($_SESSION['usuario'])) { ?>
						<li>
							<a href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
						</li>
						<li>
							<a href="registro.php"><i class="fas fa-paper-plane"></i> Registrarse</a>
						</li>

						<!--Si no hay un usuario iniciado...-->
					<?php } else { ?>
						<li>
							<a href="paginaUsuario.php"><i class="fas fa-user"></i> Mi cuenta</a>
						</li>
						<li>
							<a href="logoff.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
						</li> 
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3" style="background: #252525;">© 2019 Copyright: Zaira Bravo Sánchez</div>
	<!-- Fin Copyright -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</footer>
</html>