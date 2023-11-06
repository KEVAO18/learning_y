<?php

require_once("components/profileCard.php");

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
                    <div class="card">
                        
                    </div>
                </article>
                <article class="col-md-2 d-none d-md-block">
                    
                </article>
            </section>
        </div>
    <?php
}

?>