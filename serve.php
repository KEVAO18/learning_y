<?php

/**
 * 
 * @KEVAO18
 * 
 */

session_start();

require('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once('http/config/routes.php');

$ruta = new routesController();

require_once('web/layout/navbar.php');

$navbar = new navbar();

require_once('web/layout/footer.php');

$footer = new footer();

require_once('web/layout/head.php');

$head = new head();

require_once('web/layout/cssClases.php');

$cssClases = new cssClases();

require_once('web/layout/scripts.php');

$jsScripts = new scripts();

?>