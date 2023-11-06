<?php

    require_once("../handlers/configHandler.php");
    require_once("../../db/models/userModel.php");
    require_once("../../db/models/credentialsModel.php");

    use db\models\user;
    use db\models\credentials;
    use http\handler\config;
    
    $id = json_decode($_SESSION['userData'])->id;
    
    if ($_POST['reNewPass'] == $_POST['newPass']) {
        
        $resultado = (new config)->updatePass(
            $id, 
            $_POST['oldPass'],
            $_POST['newPass']
        );
            
    }else{
        $resultado = 2; 
    }

    echo $resultado;

    switch ($resultado) {
        case 0:
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
            
        case 1:
            
            $_SESSION["error"] = "porfavor ingrese su contraseña actual";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
            
        case 2:
            
            $_SESSION["error"] = "los campos de la nueva contraseña deben ser iguales";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
            
        default:
            
            $_SESSION["error"] = "error interno";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
    }

    

?>