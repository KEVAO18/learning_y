<?php

require_once("../handlers/signupHandler.php");

use http\handler\signup;

$signUp = new signup;

$signUp->signUp(
    $_POST['name'], 
    $_POST['user'], 
    $_POST['mail'], 
    $_POST['pass'], 
    $_POST['date'], 
    $_POST['tyc']
);


header("location: ".$_ENV['PAGE_SERVE']."/login");

?>