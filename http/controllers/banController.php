<?php

    require_once("../handlers/configHandler.php");

    use http\handler\config;
    
    if($_POST['id'] != json_decode($_SESSION['userData'])->id){
        $resultado = (new config)->deleteAccount(
            $_POST['id']
        );
    }else{
        $resultado = 2;
    }

    echo $resultado;

    switch ($resultado) {
        case 0:
            
            header("location: ".$_ENV['PAGE_SERVE']."/Tabla/porCargo");
            
            break;

        case 2:
            
            $_SESSION["error"] = "no puedes eliminar tu cuenta";
            
            header("location: ".$_ENV['PAGE_SERVE']."/Tabla/porCargo");
            
            break;
            
        default:
            
            $_SESSION["error"] = "error interno";
            
            header("location: ".$_ENV['PAGE_SERVE']."/Tabla/porCargo");
            
            break;
    }

    

?>