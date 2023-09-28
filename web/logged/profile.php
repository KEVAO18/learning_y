<?php

require_once("components/profileCard.php");

use view\components\profileCard;

function show() {

    $profileCard = new profileCard;
    
    ?>
        <section class="container py-5">
            <article class="row">
                <div class="col-md-4">
                    <?=$profileCard->show()?>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h2 class="display-4 text-center">Cursos</h2>
                        <hr>
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>estado</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </article>
        </section>
    <?php
}

?>