<?php 

// FUNCION QUE SACA DATOS DEL USUARIO
function datosUsuario($datosUsuario){
	try {
		switch ($datosUsuario) {
			case 'nombre':
				return unserialize($_SESSION['usuario'])->nombre;
			case 'apellidos':
				return unserialize($_SESSION['usuario'])->apellidos;
			case 'email':
				return unserialize($_SESSION['usuario'])->email;
			case 'usuario':
				return unserialize($_SESSION['usuario'])->usuario;
			case 'foto_perfil':
				return unserialize($_SESSION['usuario'])->foto_perfil;
			case 'id':
				return unserialize($_SESSION['usuario'])->id;
			case 'id_rol':
				return unserialize($_SESSION['usuario'])->id_rol;
			default:
				return null;
		}
	} catch (Exception $e) {
		return "No se han podido cargar los datos del usuario.";
	}
}

/* * *******************************
 * COMPROBAR CONEXION LOGIN USUARIO
 * ******************************** */
function comprobarConexionLogin(){
	try {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        	//Guardamos datos del form
			$usuario = $_POST['usuario'];
			$clave = $_POST['clave'];

        	//Guardamos datos de la conexion
			$row = comprobarConexionUsuario($usuario, $clave);

        	if ($row) { //si el usuario coincide inicia sesión
	        	$_SESSION['usuario'] = serialize($row);
	        	header("Location: index.php");
        	} else { //sino da error y no puede loguearse.
        		return $error = "Usuario o contraseña incorrectos.";
        	}
    	}
	} catch (PDOException $e) {
		return $error = "Error conexión con la base de datos. " . $e->getMessage();
	}
}

/* * *******************************
 * COMPROBAR CONEXION REGISTRO USUARIO
 * ******************************** */
function comprobarConexionRegistro() {
	try {
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        //Guardamos datos del form
	        $usuario = $_POST['usuario'];
	        $nombre = $_POST['nombre'];
	        $apellidos = $_POST['apellidos'];
	        $email = $_POST['email'];
	        $clave = $_POST['clave'];

	        //Comprobamos que el usuario no exista
	        $row = comprobarConexionUsuario($nombre, $clave);

	        if (!$row) { //si el usuario no existe...
	            $bd = conexionBD();
	            //Los inserta en la base de datos
	            $stmtInsert = $bd->prepare("INSERT INTO `usuarios` (`usuario`, `password`, `nombre`, `apellidos`, `email`) 
	                                        VALUES (:usuario, MD5(:password), :nombre, :apellidos, :email);");
	            $stmtInsert->bindParam(':usuario', $usuario);
	            $stmtInsert->bindParam(':password', $clave);
	            $stmtInsert->bindParam(':nombre', $nombre);
	            $stmtInsert->bindParam(':apellidos', $apellidos);
	            $stmtInsert->bindParam(':email', $email);
	            if($stmtInsert->execute()){ //Muestra un mensaje de que se ha creado el usuario
	                return $correcto = "El usuario se ha creado.";
	            }
	            else{
	                return $error = "No se ha podido crear el usuario.";
	            }
	        } else { //sino da error y no puede resgistrarse.
	            return $error = "El usuario ya existe.";
	        }
	    }
	} catch (PDOException $e) {
	    $error = "Error conexión con la base de datos. " . $e->getMessage();
	}
}

/* * *******************************
 * AÑADIR NUEVOS ANIMES
 * ******************************** */
function añadirNuevosAnimes() {
	try {
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	        //Guardamos datos del form
	        $nombre = $_POST['nombre'];
	        $descripcion = $_POST['descripcion'];
	        $descripcionCorta = $_POST['descripcionCorta'];
	        $urlImagen = $_POST['urlImagen'];

	        //Comprobamos que el usuario no exista
	        $row = comprobarAnime($nombre);

	        if (!$row) { //si el anime no existe...
	            $bd = conexionBD();
	            //Los inserta en la base de datos
	            $stmtInsert = $bd->prepare("INSERT INTO `peliculas_y_series` (`nombre`, `descripcion`, `descripcion_corta`, `imagen`) 
	                                        VALUES (:nombre, :descripcion, :descripcionCorta, :urlImagen);");
	            $stmtInsert->bindParam(':nombre', $nombre);
	            $stmtInsert->bindParam(':descripcion', $descripcion);
	            $stmtInsert->bindParam(':descripcionCorta', $descripcionCorta);
	            $stmtInsert->bindParam(':urlImagen', $urlImagen);
	            if($stmtInsert->execute()){ //Muestra un mensaje de que se ha creado el usuario
	                return $correcto = "El anime se ha creado.";
	            }
	            else{
	                return $error = "No se ha podido crear el anime.";
	            }
	        } else { //sino da error y no puede resgistrarse.
	            return $error = "El anime ya existe.";
	        }
	    }
	} catch (PDOException $e) {
	    $error = "Error conexión con la base de datos. " . $e->getMessage();
	}
}

/* * *********************************************
 * COMPROBAR NO EXISTA ANIME
 * ********************************************** */
function comprobarAnime($nombre) {
    try {
        //Hacemos la conexión con la base de datos 
        $bd = conexionBD();
        $stmt = $bd->prepare("SELECT * FROM `peliculas_y_series` WHERE `nombre` LIKE :nombre");
        $stmt->bindParam(':nombre', $nombre);
        if ($stmt->execute()) { //ejecutamos el statement
            $row = $stmt->fetch(PDO::FETCH_OBJ); //devuelve los datos de la linea de datos actual
            $stmt->closeCursor();
            return $row; //retorna el anime
        }
        return false;
    } catch (PDOException $e) {
        $error = "Error conexión con la base de datos." . $e->getMessage();
    }
}

/* * *******************************
 * VALORA UN ANIME 
 * ******************************** */
function valorarAnime($idAnime, $idUsuario, $valoracion) {
	try {
		$bd = conexionBD();
	    	//Lo inserta en la base de datos
		$stmtInsert = $bd->prepare("INSERT INTO `valoracion` (`id_peli_serie`, `id_usuario`, `puntuacion`) 
			VALUES (:idAnime, :idUsuario, :valoracion);");
		$stmtInsert->bindParam(':idAnime', $idAnime);
		$stmtInsert->bindParam(':idUsuario', $idUsuario);
		$stmtInsert->bindParam(':valoracion', $valoracion);

		if($stmtInsert->execute()){ //Muestra un mensaje de que se ha creado el usuario
			return $correcto = "El usuario se ha creado.";
		}
		else{
			return $error = "No se ha podido crear el usuario.";
		}
	} catch (Exception $e) {
		return "No se han podido cargar las categorías.";
	}
}

/* * *******************************
 * REGISTRO DE UN USUARIO NUEVO
 * ******************************** */

function recordarContraseña() {
	try {
		//Hacemos la conexión con la base de datos 
		$bd = conexionBD($dbHost, $dbPort, $dbDataBase, $dbUsuari, $dbPasswd);
		$stmt = $bd->prepare("SELECT * FROM `usuarios` WHERE `email` LIKE :usermail;");
		$stmt->bindParam(':usermail', $email);
		$stmt->execute(); //ejecutamos el statement
		$row = $stmt->fetch(); //devuelve los datos de la linea de datos actual
		$stmt->closeCursor();
			
		if($row){ //Si existen los datos...
			//Actualizar datos
			$stmtUpdate = $bd->prepare("UPDATE `usuarios` SET `password` = :password WHERE `email` = :usermail;");
			$stmtUpdate->bindParam(':usermail', $email);
			$stmtUpdate->bindParam(':password', $newPassEncrypted);

			if($stmtUpdate->execute()){ //Si se ha ejecutado la accion...
				//mail::send($email,"Nueva contraseña:  $newPass");
				header("Location: index.php");
			}
		}
	} catch (PDOException $e) {
		$error = "Error conexión con la base de datos." -> $e->getMessage();
	}
}

//MOSTRAR LAS CATEGORIAS DE LA BASE DE DATOS
function mostrarCategorias(){
    try {
    	$bd = conexionBD();
        $sth = $bd->prepare("SELECT * FROM categorias");
        $resul = $sth->execute();
        if (!$resul) return [];
        return $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se han podido cargar las categorías.";
    }
}

//MOSTRAR LAS PELÍCULAS Y SERIES DE LA BASE DE DATOS
function mostrarPeliculasSeries(){
    try {
    	$bd = conexionBD();
        $sth = $bd->prepare("SELECT * FROM peliculas_y_series");
        $resul = $sth->execute();
        if (!$resul) return [];
        return $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se han podido cargar las películas ni series.";
    }
}

//MUESTRA UNA CATEGORÍA FILTRADA POR ID
function mostrarCategoria($id){
    try {
        $bd = conexionBD();
        $sth = $bd->prepare( "SELECT * FROM categorias WHERE id = :id");
        $resul = $sth->execute(['id'=>$id]);
        if (!$resul) return [];
        return $sth->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se ha podido cargar la categoría.";
    }
}

//MUESTRA UNA PELÍCULA O SERIE EN CONCRETO
function mostrarPeliculaOSerie($id){
    try {
        $bd = conexionBD();
        $sth = $bd->prepare( "SELECT * FROM peliculas_y_series WHERE id = :id");
        $resul = $sth->execute(['id'=>$id]);
        if (!$resul) return [];
        return $sth->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se ha podido cargar la categoría.";
    }
}

//MUESTRA UNA PELÍCULA O SERIE EN CONCRETO
function sacarListaDeseos($id){
    try {
        $bd = conexionBD();
        $sth = $bd->prepare( "SELECT pys.nombre AS nombreSerie, ldd.nombre AS nombreLista FROM `peliculas_y_series` pys 
        						INNER JOIN `lineas_lista_deseo` lld ON pys.id = lld.id_pelicula_serie 
        						INNER JOIN `lista_de_deseos` ldd ON ldd.id = lld.id_lista WHERE ldd.id_usuario = $id 
        						GROUP BY pys.id, ldd.nombre");
        $resul = $sth->execute(['id'=>$id]);
        if (!$resul) return [];
        return $sth->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se ha podido cargar.";
    }
}

// CARGA LAS PELÍCULAS Y SEIRES FILTRADAS POR ID DE CATEGORÍA
function cargarPysDeCategoria($id){
    try {
        $bd = conexionBD();
        $sth= $bd->prepare("SELECT pys.* FROM peliculas_y_series pys INNER JOIN categorias_pelicula_serie cps ON pys.id = cps.id_pelicula_serie WHERE cps.id_categoria = :id");
        $resul = $sth->execute(['id'=>$id]);
        if (!$resul) return [];
        return $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se han podido cargar los datos.";
    }
}

// CARGA LAS VALORACIONES DE UN ANIME EN CONCRETO
function cargarValoracionesDeUnAnime($id){
    try {
        $bd = conexionBD();
        $sth= $bd->prepare("SELECT * FROM valoracion WHERE id_peli_serie = :id");
        $resul = $sth->execute(['id'=>$id]);
        if (!$resul) return [];
        return $sth->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        return "No se han podido cargar los datos.";
    }
}
function canValorate($idAnime, $idUsuario){
	$bd = conexionBD();
        $stmt = $bd->prepare("SELECT * FROM `valoracion` WHERE `id_peli_serie` LIKE :idAnime AND `id_usuario` LIKE :idUsuario");
        $stmt->bindParam(':idAnime', $idAnime);
        $stmt->bindParam(':idUsuario', $idUsuario);
        if ($stmt->execute()) { //ejecutamos el statement
            $row = $stmt->fetch(PDO::FETCH_OBJ); //devuelve los datos de la linea de datos actual
            $stmt->closeCursor();
            return $row == false; //retorna el usuario
        }
        return false;
}
//CALCULA LA MEDIA DE LAS VALORACIONES DE UN ANIME
function calcularValoracionMedia($valoraciones){
	$suma = 0;
	$contadorValoraciones = 0;
	$media = 0;
	$numEstrellas = 0;
	$estrellas = "";

	//Si no hay ninguna valoracion la media sera 0 (porque no se puede dividir por 0)
	if (empty($valoraciones)) {
		$media = 0;
	} else { 
		//Si hay valoraciones se calculara la media de las valoraciones de los usuarios
		foreach ($valoraciones as $valoracion) {
			$puntuacion = $valoracion->puntuacion;
			$suma += $puntuacion;
			$contadorValoraciones += 1;
		} 
		$media = $suma / $contadorValoraciones;
	}

	//La valoracion maxima es 10, y el máximo de estrellas es 5, por lo que es la media de estrellas
	$numEstrellas = $media / 2;

	//Recorremos el numero de estrellas para pintarlas con la valoracion
	for ($i=0; $i <= $numEstrellas -1; $i++) { 
	 	$estrellas = $estrellas."★";
	 	if ($i < $numEstrellas) {
	 		$estrellas." ";
	 	}
	}
	//Si no ha llegado a 5 estrellas pondra estrellas vacias.
	for ($i=0; $i < (5-$numEstrellas); $i++) { 
		$estrellas = $estrellas."☆";
		if ($i < $numEstrellas) {
	 		$estrellas." ";
	 	}
	}

	//Retornamos las estrellas y valoraciones
	return "<span class=\"text-warning\">$estrellas</span><span> $media<span><br><small>Valorado por $contadorValoraciones usuarios</small>";
}

function subirImagen($idUsuario, $imgPerfil) {
	try {
		$bd = conexionBD();
	        //Los inserta en la base de datos
		$stmtInsert = $bd->prepare("UPDATE `usuarios` SET foto_perfil = :imgPerfil WHERE id = :idUsuario;");
		$stmtInsert->bindParam(':imgPerfil', $imgPerfil);
		$stmtInsert->bindParam(':idUsuario', $idUsuario);
	    if($stmtInsert->execute()){ //Muestra un mensaje de que se ha creado el usuario
	        return $correcto = "Se ha cambiado la imagen.";
	    }
	    else{
	        return $error = "No se ha cambiado la imagen.";
	    }
	    
	} catch (PDOException $e) {
	    $error = "Error conexión con la base de datos. " . $e->getMessage();
	}
}

//GENERADOR DE CONTRASEÑA ALEATORIA
function generaPass(){
   	//Se define una cadena de caractares.
	$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@#!€%&()";
    //Obtenemos la longitud de la cadena de caracteres
	$longitudCadena=strlen($cadena);
    //Definimos la variable que va a contener la contraseña
	$pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
	$longitudPass=10;

   	//Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
	for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
		$pos=rand(0,$longitudCadena-1);

        //Vamos formando la contraseña con cada carácter aleatorio.
		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}