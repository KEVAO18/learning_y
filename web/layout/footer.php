<?php


class footer
{

    public function __construct()
    {
    }

    public function show($appname)
    {
        ?>
        <footer class="page-footer font-small blue pt-4">
            <div class="container-fluid text-center text-md-left">
                <div class="row">
                    <div class="col-md-8 mt-md-0 mt-3">
                        <h5 class="text-uppercase"><?=$appname?></h5>
                        <p>Description (pendiente)</p>
                    </div>
                    <hr class="clearfix w-100 d-md-none pb-3">
                    <!-- Grid column -->

                    <div class="col-md-4 mb-md-0 mb-3">
                        <h5 class="text-uppercase">More</h5>

                        <?=(isset($_SESSION['userData']))? $this->log() : $this->out()?>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2023 Copyright:
                <a class="text-decoration-none text-dark" href="https://mdbootstrap.com/education/angular/">Kevin Andres Orrego Martinez</a>
            </div>
        </footer>
        <?php
    }

    public function log() {
        ?>
        
        <ul class="list-unstyled">
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/dashboard">dashboard</a>
            </li>
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/profile">profile</a>
            </li>
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/cursos">cursos</a>
            </li>
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/configuraciones">configuraciones</a>
            </li>
        </ul>

        <?php
    }
    
    public function out() {
        ?>
        
        <ul class="list-unstyled">
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/home">Home</a>
            </li>
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/login">Iniciar Sesion</a>
            </li>
            <li>
                <a class="text-decoration-none text-dark" href="<?=$_ENV['PAGE_SERVE']?>/signup">Registrarte</a>
            </li>

        </ul>

        <?php
    }

}


?>