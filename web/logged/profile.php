<?php

require_once("components/profileCard.php");
require_once("../http/handlers/usu_curHandler.php");
require_once("../http/handlers/cursosHandler.php");

use http\handler\cursoH;
use http\handler\usu_curH;
use web\logged\components\profileCard as pc;

function show() {

    $curso = new cursoH;
    $uc = new usu_curH;

    $profileCard = new pc;
    
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
                                <th>profesor</th>
                                <th>estado</th>
                            </tr>
                            <?php

                            foreach ($uc->optain(json_decode($_SESSION['userData'])->id) as $d) {
                                ?>
                            <tr>
                                <td><?=$d['id_curso']->getID()?></td>
                                <td>
                                    <a class="text-decoration-none text-success" title="ver curso" href="<?=$_ENV['PAGE_SERVE']?>/curso/<?=$d['id_curso']->getId()?>">
                                        <?=$d['id_curso']->getNomCurso()?>
                                    </a>
                                </td>
                                <td><?=$d['id_curso']->getProfesor()->getNombre()?></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?=$d['state']?>%;"
                                            aria-valuenow="<?=$d['state']?>" aria-valuemin="0" aria-valuemax="100" progress-bar-animated><?=$d['state']?>%</div>
                                    </div>
                                </td>
                            </tr>
                                <?php
                            }

                            ?>
                        </table>
                        
                    </div>
<br>
                    <div class="card">
                        <h2 class="display-4 text-center">Cursos</h2>
                        <hr>
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>profesor</th>
                                <th>estado</th>
                            </tr>
                            <?php

                            foreach ($curso->optain() as $d) {
                                ?>
                            <tr>
                                <td><?=$d->getID()?></td>
                                <td>
                                    <a class="text-decoration-none text-success" title="ver curso" href="<?=$_ENV['PAGE_SERVE']?>/curso/<?=$d->getId()?>">
                                        <?=$d->getNomCurso()?>
                                    </a>
                                </td>
                                <td><?=$d->getProfesor()->getNombre()?></td>
                                <td>
                                    
                                </td>
                            </tr>
                                <?php
                            }

                            ?>
                        </table>
                        
                    </div>
                </div>
            </article>
        </section>
    <?php
}

?>