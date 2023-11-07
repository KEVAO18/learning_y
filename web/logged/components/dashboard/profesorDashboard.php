<?php

namespace web\logged\components\dashboard{

    // require_once("../http/handlers/cursosHandler.php");
    require_once("../db/models/cursoModel.php");

    use db\models\curso;
    // use http\handler\cursoH;
    class profesor
    {

        public function __construct() {
            
        }

        public function show() {
            ?>
            <h2 class="display-5">Tablero de Profesor</h2>
            <?php
        }
    }
}