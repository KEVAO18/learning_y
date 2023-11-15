<?php

require_once("components/profileCard.php");
require_once("components/dashboard/adminDashboard.php");
require_once("components/dashboard/alumnoDashboard.php");
require_once("components/dashboard/alumnoEspecialDashboard.php");
require_once("components/dashboard/profesorDashboard.php");
require_once("components/dashboard/soporteDashboard.php");

use web\logged\components\dashboard\admin;
use web\logged\components\dashboard\alumno;
use web\logged\components\dashboard\alumnoEspecial;
use web\logged\components\dashboard\profesor;
use web\logged\components\dashboard\soporte;

use web\logged\components\profileCard as pc;

function show() {
    $profileCard = new pc;
    ?>
        <div class="container-fluid py-4">
            <section class="row">
                <article class="col-md-3 d-none d-md-block">
                    <?=$profileCard->show()?>
                </article>
                <article class="col-md-7">
                    <div class="card p-4">
                        <h3 class="display-5 text-center">Crear cursos</h3>
                        <hr>
                        <form action="<?=$_ENV['PAGE_SERVE']?>/http/controllers/newCurso.php" method="post">

                            <div class="mb-3">
                                <label for="curso" class="form-label display-6">Nombre del curso</label>
                                <input type="text" class="form-control" id="curso" name="curso" value="">
                            </div>

                            <h5 class="display-6">Descripcion</h5>
                            <textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea>

                            <br>
                            
                            <input type="hidden" name="numTemas" value="" id="numTemas">

                            <div class="card shadow my-4 p-3" id="temas">

                            </div>
                                
                            <div class="d-grid gap-4">
                                <p id="btn-add" class="btn btn-outline-success">mas temas</p>
                            </div>
                            
                            <div class="d-grid gap-4">
                                <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
                            </div>
                        </form>
                        

                    </div>
                </article>
                <article class="col-md-2 d-none d-md-block">

                </article>
            </section>
        </div>
        <script>

        var contenedor = document.getElementById("temas");

        var contador = document.getElementById("numTemas");
        
        var btn = document.getElementById("btn-add");

        var template = () => {

            return `<div class="row py-4">
                    <div class="col-12">
                        <input type="text" name="t`+(contenedor.childElementCount+1)+`" id="t`+(contenedor.childElementCount+1)+`" class="form-control" placeholder="tema # `+(contenedor.childElementCount+1)+`">
                    </div>
                </div>
                `
        };

        btn.addEventListener("click", (e) => {
            e.preventDefault();

            contenedor.insertAdjacentHTML("beforeend", template());
            contador.value = contenedor.childElementCount;
        });

        </script>
    <?php
}

?>