<?php

require_once("components/profileCard.php");

use view\components\profileCard;

function show() {
    $profileCard = new profileCard;
    ?>
        <div class="container-fluid py-4">
            <section class="row">
                <article class="col-md-3">
                    <?=$profileCard->show()?>
                </article>
                <article class="col-md-9">
                    <div class="card">
                        
                    </div>
                </article>
            </section>
        </div>
    <?php
}

?>