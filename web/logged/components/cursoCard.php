<?php

namespace web\logged\components{

    require_once("../http/handlers/cursosHandler.php");
    require_once("../db/models/cursoModel.php");

    use db\models\curso;
    use http\handler\cursoH;
    class cursoCard
    {

        public function __construct() {
            
        }

        public function showAll() {
            $temp_curso = new cursoH;
            $i = 1;
            foreach ($temp_curso->optain() as $tc) {
                if($i%2 == 1){
                    ?>
                        <div class="row">
                    <?php
                }

                $this->card($tc);

                if($i == 0 || $i%2 == 0){
                    ?>
                        </div>
                    <?php
                }
                $i++;
            }
        }

        public function card(curso $data) {
            ?>
                <div class="col-sm-6 my-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="display-6 text-center">
                                <?=$data->getNomCurso()?>
                            </h2>
                            <p class="text-center"><?=$data->getProfesor()->getNombre()?></p>
                            <p class="text-center"><?=$data->getDescripcion()?></p>
                            <div class="d-grid">
                                <a class="btn btn-block btn-outline-dark" href="<?=$_ENV['PAGE_SERVE']?>/curso/<?=$data->getId()?>">Ver curso</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
}