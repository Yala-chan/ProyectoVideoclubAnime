<!-- Zaira Bravo Sánchez - 2nd DAW -->

<?php 
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();
include('../Helpers/conexion.php');