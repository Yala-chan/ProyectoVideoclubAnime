<!-- Zaira Bravo Sánchez - 2nd DAW -->

<?php include_once "template/head.php"; ?>

<!-- *********** MENU WEB *********** -->
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <img id="logo" src="./imagenes/logo.png" class="d-inline-block align-top" alt="logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <!--Si hay un usuario iniciado y es un empleado...-->
                    <?php if (isset($_SESSION['usuario']) && (datosUsuario('id_rol') == 1)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="añadir_anime.php"><i class="fas fa-plus-circle"></i> Añadir nuevo anime</a>
                        </li>
                    <?php } ?>

                    <!--Si hay un usuario iniciado...-->
                    <?php if (!isset($_SESSION['usuario'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registro.php"><i class="fas fa-paper-plane"></i> Registrarse</a>
                        </li>

                        <!--Si no hay un usuario iniciado...-->
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="paginaUsuario.php"><i class="fas fa-user"></i> Mi cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logoff.php"><i class="fas fa-sign-out-alt"></i> Salir</a>
                        </li> 
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>