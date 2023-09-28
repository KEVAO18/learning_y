<?php

namespace view\components{

    class permisosCard{
        
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
                
            </div>
            <?php
        }

    }
    

}