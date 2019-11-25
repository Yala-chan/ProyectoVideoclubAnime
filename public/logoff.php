<?php

include('headCode.php');
$_SESSION = array();
session_destroy(); // eliminar la sesion
setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
header("Location: index.php"); //Te lleva a la pagina de inicio.