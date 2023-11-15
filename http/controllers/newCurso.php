<?php

require_once("../handlers/cursosHandler.php");

use http\handler\cursoH;

$newC = new cursoH;

$temas = array();

for($i = 1; $i <= $_POST['numTemas']; $i++){
    $temas["t".$i] = $_POST['t'.$i];
}

$userData = json_decode($_SESSION['userData']);

$datos = $newC->newCurso(
    $userData->id,
    $_POST['curso'],
    $_POST['txtDescripcion'],
    json_encode($temas)
);

print($datos);

header("location: ".$_ENV['PAGE_SERVE']."/cursos");

?>