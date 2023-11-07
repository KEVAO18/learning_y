<?php

namespace web\logged\components\dashboard{


    require_once(__DIR__."/../../../../db/models/credentialsModel.php");
    require_once(__DIR__."/../tablas/usuarios.php");

    use db\models\credentials;
    use web\logged\components\tablas\usuarios;

    class admin
    {

        public function __construct() {
            
        }

        public function show() {

            $datos = (new credentials)->getAll();
            
            ?>
            
            <h2 class="display-5">Tablero de Usuarios</h2>
            
            <hr>
            
            <?php

            (new usuarios)->porCargo($datos, "Administrador");
            (new usuarios)->porCargo($datos, "Soporte");
            (new usuarios)->porCargo($datos, "Profesor");
            (new usuarios)->porCargo($datos, "Alumno especial");
            (new usuarios)->porCargo($datos, "alumno");

        }

        public function showAll() {

            $datos = (new credentials)->getAll();
            
            ?>
            
            <h2 class="display-5">Tablero de Usuarios</h2>
            
            <hr>
            
            <?php

            (new usuarios)->all($datos);

        }
    }
}