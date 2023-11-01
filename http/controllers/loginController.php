<?php

require_once("../handlers/loginHandler.php");

use http\handler\login;

$login = new login;

$data = $login->logIn(
    explode("'", $_POST['user'])[0]
);

try {
    if(password_verify($_POST['pass'], $data->getPassword())){

        $_SESSION['userData'] = $data->toJSON();

        header("location: ".$_ENV['PAGE_SERVE']."/dashboard");

    }else{
        $_SESSION["error"] = "contraseña invalida";
        
        header("location: ".$_ENV['PAGE_SERVE']."/login");

    }

} catch (\Throwable $th) {

    $_SESSION["error"] = "Usuario incorrecto";

    header("location: ".$_ENV['PAGE_SERVE']."/login");
    
}

?>