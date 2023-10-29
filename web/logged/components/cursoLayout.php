<?php

namespace web\logged\components{

    require_once("../http/handlers/cursosHandler.php");
    require_once("../db/models/cursoModel.php");

    use db\models\curso;
    use http\handler\cursoH;
    class cursoLayout
    {

        public function __construct() {
            
        }

        public function show(int $id) {

            $data = (new cursoH)->opptainOne($id);

            ?>
                <div class="">
                    <div class="row">
                        <div class="col-sm-12 py-4">
                            <h1 class="display-3 text-center">
                                <?=$data->getNomCurso()?>
                            </h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4 class="display-5">
                                Informacion
                            </h4>
                            <hr>
                            <p>
                                <?=$data->getProfesor()->getNombre()?>
                            </p>
                            <p>
                                <?=$data->getDescripcion()?>
                            </p>
                        </div>
                        <div class="col-sm-8">
                            <h4 class="display-5 text-center">Contenidos</h4>
                            <hr>
                            <div id="recursos">
                            </div>
                            </table>
                        </div>
                    </div>
                    <div class="d-grid">
                        <a href="" class="btn btn-block btn-outline-success">Inscribirse</a>
                    </div>
                </div>
                <script>
                    var domTable = document.getElementById("recursos");

                    fetch(

                    '<?=$_ENV['PAGE_SERVE']?>/db/cursos/<?=$id?>.json'

                    ).then(

                        response => response.json()

                    ).then(
                        data => {
                            for(d in data){
                                var addThis = `
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <h6 class="display-5 text-success py-2 text-wrap">`+d+`</h6>
                                                <ul class="list-group py-4">
                                `
                                for(d2 in data[d][0]){
                                    addThis += `
                                                    <li class="list-group-item text-wrap">`+d2+`</li>
                                    `
                                }
                                addThis += `
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                `
                                domTable.innerHTML += addThis
                            }
                        }
                    ).catch( 
                        error => {

                            var addThis = `
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <h6 class="display-5 text-success py-2 text-wrap">Sin Informacion</h6>
                                            </div>
                                        </div>
                                    </div>
                                `
                                domTable.innerHTML += addThis

                        } 
                            
                    );
                </script>
            <?php
        }
    }
}