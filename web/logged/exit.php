<?php

    session_start();
    session_destroy();

    header("location: ".$_ENV['PAGE_SERVE']."/login");

?>