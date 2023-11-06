<?php

    require_once("../handlers/configHandler.php");
    require_once("../../db/models/userModel.php");
    require_once("../../db/models/credentialsModel.php");

    use db\models\user;
    use db\models\credentials;
    use http\handler\config;
    
    $id = json_decode($_SESSION['userData'])->id;
    
    $resultado = (new config)->updatePersonalI(
        $id, 
        $_POST['name'],
        $_POST['user'],
        $_POST['mail']
    );

    echo $resultado;

    switch ($resultado) {
        case 0:
            
            $_SESSION['userData'] = (new user)->find("id =".$id)->toJson();

            $_SESSION['userCred'] = (new credentials)->find("id_user = ".$id)->getCredentialType()->toJson();
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
            
        case 1:
            
            $_SESSION["error"] = "user en uso";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;

        case 2:
            
            $_SESSION["error"] = "mail en uso";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
            
        default:
            
            $_SESSION["error"] = "error interno";
            
            header("location: ".$_ENV['PAGE_SERVE']."/configuraciones");
            
            break;
    }

    

?>