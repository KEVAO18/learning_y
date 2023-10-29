<?php

require_once('components/cursoCard.php');
require_once('components/profileCard.php');

use web\logged\components\profileCard as pc;
use web\logged\components\cursoCard as cc;

function show() {

    $profileCard = new pc;
    $cursoCard = new cc;
    
    ?>
        <div class="container-fluid py-4">
            <section class="row">
                <article class="col-md-3">
                    <?=$profileCard->show()?>
                </article>
                <article class="col-md-9">
                    <?=$cursoCard->showAll()?>
                </article>
            </section>
        </div>
    <?php
}

?>