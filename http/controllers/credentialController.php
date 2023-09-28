<?php

require_once("../handlers/credentialHandler.php");

use http\handler\credential;

$cred = new credential;

foreach ($cred->addCredential($_POST['id'], 0) as $d) {
    
}

?>