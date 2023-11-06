<?php

namespace web\logged\components{

    class profileCard{

        public function __construct() {
        }

        function show() {

            if(!isset($_SESSION['userData']) && !isset($_SESSION['userCred'])){
                $this->outLog();
            }else{
                echo 
                $this->logged(
                    json_decode($_SESSION['userData']),
                    json_decode($_SESSION['userCred'])
                );
            }
        }

        public function outLog(){
            header("location: ".$_ENV['PAGE_SERVE']."/login");
        }
    
        function logged($ru, $rc){
            ?>
            <div class="card p-4">
                <img src="<?=$_ENV['FOLDER_IMAGES']?>/default.jpg" class="rounded-circle img-profile mb-4" alt="Pruebas">
                <div class="text-center mb-4 fs-5"><?=$ru->name?></div>
                <div class="text-center mb-4 fs-5">@<?=$ru->user?></div>
                <div class="text-center mb-4 fs-5"><?=$rc->description?></div>
                <div class="text-center mb-4 fs-5"><?=$ru->mail?></div>
                <div class="text-center mb-4 fs-5"><?=$ru->birthday?></div>
            </div>
            <?php
        }
    }
}