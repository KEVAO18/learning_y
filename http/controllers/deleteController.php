<?php

    require_once("../handlers/configHandler.php");

    use http\handler\config;
    
    $resultado = (new config)->deleteAccount(
        $_POST['id']
    );

    echo $resultado;

    switch ($resultado) {
        case 0:
            
            header("location: ".$_ENV['PAGE_SERVE']."/exit");
            
            break;
            
        default:
            
            $_SESSION["error"] = "error interno";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
    }

    

?>