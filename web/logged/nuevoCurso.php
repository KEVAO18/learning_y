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
                        <form action="" method="post">

                            <div class="mb-3">
                                <label for="curso" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="curso" name="curso" value="">
                            </div>

                            <div class="mb-3">
                                <label for="describ" class="form-label">descripcion del curso</label>
                                <input type="text" class="form-control" id="describ" name="describ" value="">
                            </div>

                            <div class="card shadow my-4 p-3" id="temas">
                                
                            </div>
                            
                            <div class="d-grid gap-4">
                                <p id="btn-add" class="btn btn-outline-success">mas temas o subtemas</p>
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

        var template = `<div class="row py-4">
            <div class="col-8">
                <input type="text" name="t" class="form-control" placeholder="tema o sub tema">
            </div>
            <div class="col-4">
            <select class="form-select" name="c">
                <option value="1">Tema</option>
                <option value="2">Sub Tema</option>
            </select>
            </div>
        </div>
        `

        var btn = document.getElementById("btn-add");

        btn.addEventListener("click", (e) => {
            e.preventDefault
            contenedor.innerHTML += template
        })


        </script>
    <?php
}

?>