<?php

require_once("../handlers/signupHandler.php");

use http\handler\signup;

$signUp = new signup;

$verificacion = $signUp->signUp(
    $_POST['name'], 
    $_POST['user'], 
    $_POST['mail'], 
    password_hash($_POST['pass'], PASSWORD_BCRYPT),
    $_POST['date'], 
    $_POST['tyc']
);

if($verificacion == 1){
    
    header("location: ".$_ENV['PAGE_SERVE']."/login");
    
}else{
    switch ($verificacion) {
        case 2:
            $_SESSION["error"] = "nombre de usuario en uso";
            break;

        case 3:
            $_SESSION["error"] = "e-mail en uso";
            break;
    }
    header("location: ".$_ENV['PAGE_SERVE']."/signup");
}



?>