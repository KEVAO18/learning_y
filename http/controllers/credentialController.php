<?php

require_once("../handlers/credentialHandler.php");

use http\handler\credential;

$cred = new credential;

$cred->addCredential($_POST['id'], 1);

// if (isset($_SESSION['userData'])) {
//     header("location: ".$_ENV['PAGE_SERVE']."/dashboard");
// }else{
//     header("location: ".$_ENV['PAGE_SERVE']."/login");
// }

?>