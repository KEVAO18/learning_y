<?php


class head{

    public function __construct() {
    }

    public function show(){
        $datos = isset($_SESSION['userData']) ? true : false;

        if(!$datos){
            $this->outLog();
        }else{
            echo 
            $this->logged(json_decode($_SESSION['userData'])->user);
        }
    }

    public function outLog(){
        ?>
        <header class="flex-wrap">
            <div>
                <h1 class="display-2 text-center "><?=$_ENV['APP_NAME']?></h1>
            </div>
        </header>
        <?php
    }

    function logged($user){
        
    }
}


?>