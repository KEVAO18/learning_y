<?php

require_once("../handlers/loginHandler.php");

use http\handler\login;

$login = new login;

$data = $login->logIn(
    explode("'", $_POST['user'])[0],
    explode("'", $_POST['pass'])[0]
);

foreach ($data as $d) {
    $_SESSION['userData'] = json_encode($d);
    break;
}

if (isset($_SESSION['userData'])) {
    header("location: ".$_ENV['PAGE_SERVE']."/dashboard");
}else{
    header("location: ".$_ENV['PAGE_SERVE']."/login");
}

?>