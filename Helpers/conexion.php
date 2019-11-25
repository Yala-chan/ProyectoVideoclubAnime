<!-- Zaira Bravo Sánchez - 2nd DAW -->

<?php
/* * *******************************
 * CONEXIÓN BASE DE DATOS
 * ******************************** */
$dbHost = 'localhost';
$dbPort = 3306;
$dbDataBase = 'videoclub_anime';
$dbUsuari = 'root';
$dbPasswd = 'root';

function conexionBD(): PDO {
    global $dbHost;
    global $dbPort;
    global $dbDataBase;
    global $dbUsuari;
    global $dbPasswd;

    return new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbDataBase", $dbUsuari, $dbPasswd);
}

/* * *********************************************
 * COMPROBAR CONEXION LOGIN USUARIO
 * ********************************************** */
function comprobarConexionUsuario($nombre, $clave) {
    try {
        $claveMd5 = md5($clave);
        //Hacemos la conexión con la base de datos 
        $bd = conexionBD();
        $stmt = $bd->prepare("SELECT * FROM `usuarios` WHERE `usuario` LIKE :username AND `password` LIKE :contrasenya");
        $stmt->bindParam(':username', $nombre);
        $stmt->bindParam(':contrasenya', $claveMd5);
        if ($stmt->execute()) { //ejecutamos el statement
            $row = $stmt->fetch(PDO::FETCH_OBJ); //devuelve los datos de la linea de datos actual
            $stmt->closeCursor();
            return $row; //retorna el usuario
        }
        return false;
    } catch (PDOException $e) {
        $error = "Error conexión con la base de datos." . $e->getMessage();
    }
}