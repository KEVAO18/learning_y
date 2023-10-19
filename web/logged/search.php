<?php

require_once('components/cursoCard.php');
require_once('components/profileCard.php');

use view\components\profileCard;
use view\components\cursoCard;

function show() {

    $profileCard = new profileCard;
    $cursoCard = new cursoCard;
    
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