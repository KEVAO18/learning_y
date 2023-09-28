<?php

namespace view\components{

    class profileCard
    {

        public function __construct() {
        }

        function show() {
            $datos = isset($_SESSION['userData']) ? true : false;

            if(!$datos){
                $this->outLog();
            }else{
                echo 
                $this->logged(json_decode($_SESSION['userData']));
            }
        }

        public function outLog(){
            header("location: ".$_ENV['PAGE_SERVE']."/login");
        }
    
        function logged($request){
            ?>
            <div class="card p-4">
                <img src="<?=$_ENV['FOLDER_IMAGES']?>/default.jpg" class="rounded-circle img-profile mb-4" alt="Pruebas">
                <div class="text-center mb-4 fs-4">Nombre: <?=$request->name?></div>
                <div class="text-center mb-4 fs-4">Nombre de usuario: <?=$request->user?></div>
                <div class="text-center mb-4 fs-4">Correo electronico: <?=$request->mail?></div>
                <div class="text-center mb-4 fs-4">Cumpleaños: <?=$request->birthday?></div>
                <form action="<?=$_ENV['PAGE_SERVE']?>/http/controllers/credentialController.php" method="post">
                    <input type="hidden" name="id" value="<?=$request->id?>">
                    <button type="submit" class="btn btn-outline-dark w-100">Pedir acceso de maestro</button>
                </form>
            </div>
            <?php
        }
    }
}