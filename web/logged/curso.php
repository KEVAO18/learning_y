<?php

require_once('components/cursoLayout.php');
require_once('components/cursoCard.php');
require_once("../http/handlers/cursosHandler.php");

use http\handler\cursoH;
use web\logged\components\cursoCard;
use web\logged\components\cursoLayout;

function show($id) {

    $cursoLayout = new cursoLayout;
    $cursoCard = new cursoCard;
    
    ?>
        <div class="container py-4">
            <section>
                <article class="row">
                    <div class="col-md-12">
                        <?=$cursoLayout->show($id)?>
                    </div>
                </article>
                <article class="row py-4">
                    <?=($id > 1)? $cursoCard->card((new cursoH)->opptainOne($id - 1)) : ""?>
                    <?=($id > 2)? $cursoCard->card((new cursoH)->opptainOne($id - 2)) : ""?>
                </article>
            </section>
        </div>
    <?php
}

?>