<?php

require_once("../handlers/signupHandler.php");

use http\handler\signup;

$signUp = new signup;

$datos = $signUp->signUp(
    explode("'",$_POST['name'])[0], 
    explode("'",$_POST['user'])[0], 
    explode("'",$_POST['mail'])[0], 
    explode("'",$_POST['pass'])[0], 
    explode("'",$_POST['date'])[0], 
    explode("'",$_POST['tyc'])[0]
);

header("location: ".$_ENV['PAGE_SERVE']."/login");

?>