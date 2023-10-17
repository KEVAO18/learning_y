<?php

require_once("../handlers/loginHandler.php");

use http\handler\login;

$login = new login;

$data = $login->logIn(
    "'".explode("'", $_POST['user'])[0]."'",
    "'".explode("'", $_POST['pass'])[0]."'"
);

try {
    if($data->toJSON()){
        $_SESSION['userData'] = $data->toJSON();

        header("location: ".$_ENV['PAGE_SERVE']."/dashboard");

    }

} catch (\Throwable $th) {

    header("location: ".$_ENV['PAGE_SERVE']."/login");
    
}

?>