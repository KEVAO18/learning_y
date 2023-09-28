<?php

/**
 * @KEVAO18
 */
class routesController{

	function __construct(){

	}

    function route() {

        if(!isset($_SESSION['userData'])){

            $this->outRoute();

        }else{

            $this->inRoute();

        }

    }

	public function outRoute(){

        $ruta = array();

        if (isset($_GET["p"])) {
            $p = $_GET["p"];
            $ruta = explode("/", $p);
        }

        if(!isset($_SESSION['userData'])){
            try {
                @require_once('../web/'.$ruta['0'].'.php');
                try {
                    show();
                } catch (\Throwable $th) {
                    $this->error();
                }
            } catch (\Throwable $th) {
                $this->error();
            }
        }else{
            header("location: ".$_ENV['PAGE_SERVE']."/login");
        }
	}

    public function inRoute(){

        $ruta = array();

        if (isset($_GET["p"])) {
            $p = $_GET["p"];
            $ruta = explode("/", $p);
        }

        if(isset($_SESSION['userData'])){
            try {
                @require_once('../web/logged/'.$ruta['0'].'.php');
                try {

                    show();

                } catch (\Throwable $th) {

                    $this->error();

                }

            } catch (\Throwable $th) {

                $this->error();
                
            }
        }else{
            header("location: ".$_ENV['PAGE_SERVE']."/dashboard");
        }
	}

    public function error() {
        ?>
        <h1 class="text-center display-2 pt-4">Error</h1>
        <h1 class="text-center display-2 pb-4">404</h1>
        <p class="display-6 text-center">Page not found</p>
        <?php
    }
}
?>