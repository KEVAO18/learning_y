<?php

require_once("../handlers/credentialHandler.php");

use db\models\credentialsTypes;
use db\models\user;
use http\handler\credential;

$cred = new credential;

$cred->addCredential(
    (new user)->find("id = '".$_POST['id']."'"), 
    (new credentialsTypes)->find("id = 5")
);

?>