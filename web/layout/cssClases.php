<?php


class cssClases
{

    public function __construct()
    {
    }

    public function show()
    {
        ?>

            <!-- Bootstrap -->
            <link href="<?=$_ENV['PAGE_SERVE']?>/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="<?=$_ENV['FOLDER_CSS']?>/footer.css">
            <link rel="stylesheet" href="<?=$_ENV['FOLDER_CSS']?>/header.css">
            <link rel="stylesheet" href="<?=$_ENV['FOLDER_CSS']?>/image.css">
            <link rel="stylesheet" href="<?=$_ENV['FOLDER_CSS']?>/text.css">
            <link rel="stylesheet" href="<?=$_ENV['FOLDER_CSS']?>/button.css">
            
        <?php
    }

}


?>