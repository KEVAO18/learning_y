<?php

namespace view\components{

    require_once("../http/handlers/cursosHandler.php");

    use http\handler\cursoH;
    class cursoCard
    {

        public function __construct() {
            
        }

        function showAll() {
            $temp_curso = new cursoH;
            $i = 1;
            foreach ($temp_curso->optain() as $tc) {
                if($i%2 == 1){
                    ?>
                        <div class="row">
                    <?php
                }
                ?>
                <div class="col-sm-6 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="display-6 text-center">
                                <?=$tc->getNomCurso()?>
                            </h2>
                            <p class="text-center"><?=$tc->getProfesor()->getNombre()?></p>
                            <p class="text-center"><?=$tc->getDescripcion()?></p>
                        </div>
                    </div>
                </div>
                <?php
                if($i == 0 || $i%2 == 0){
                    ?>
                        </div>
                    <?php
                }
                $i++;
            }
        }
    }
}