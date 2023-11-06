<?php


class navbar{

    public function __construct() {
    }

    public function show(){
        $datos = isset($_SESSION['userData']) ? true : false;

        if(!$datos){
            $this->outLog();
        }else{
            $this->logged(json_decode($_SESSION['userData'])->user);
        }
    }

    public function outLog(){
        ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="nav">
                <div class="container">
                    <a class="navbar-brand disabled" href="<?=$_ENV['PAGE_SERVE']?>/home">
                        <?=$_ENV['APP_NAME']?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?=$_ENV['PAGE_SERVE']?>/signup">Registrarse</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?=$_ENV['PAGE_SERVE']?>/login">Iniciar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
    }

    function logged($user){
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="nav">
            <div class="container">
                <a class="navbar-brand disabled" href="<?=$_ENV['PAGE_SERVE']?>/dashboard">
                    <?=$_ENV['APP_NAME']?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$user?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>/dashboard">dashboard</a></li>
                                <li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>/profile">profile</a></li>
                                <li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>/cursos">Cursos</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>/configuraciones">Configuration</a></li>
                                <li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>/exit">exit</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    }
}


?>