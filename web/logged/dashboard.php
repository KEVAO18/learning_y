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
                        <?php
                        
                        
                        ?>
                    </div>
                </article>
                <article class="col-md-2 d-none d-md-block">
                    
                </article>
            </section>
        </div>
    <?php
}

?>