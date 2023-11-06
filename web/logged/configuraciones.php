<?php

require_once('components/cursoLayout.php');
require_once('components/cursoCard.php');
require_once("../http/handlers/cursosHandler.php");

use http\handler\cursoH;
use web\logged\components\cursoCard;
use web\logged\components\cursoLayout;

function show() {

    ?>
    
    <div class="container">
        <div class="row">

            <!-- ------------------- informacion personal ------------------- -->

            <div class="col-sm-8 py-4">
                <div class="card shadow">
                    <h1 class="display-6 card-header text-center">Informacion personal</h1>
                    <div class="card-body">

                        <form action="<?=$_ENV['PAGE_SERVE']?>/http/controllers/updateController.php" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="Nombre usado" value="<?=json_decode($_SESSION['userData'])->name?>">
                            </div>

                            <div class="mb-3">
                                <label for="user" class="form-label">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="user-addon">@</span>
                                    <input type="text" class="form-control" id="user" name="user" aria-describedby="Usuario usado" value="<?=json_decode($_SESSION['userData'])->user?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="mail" class="form-label">email</label>
                                <input type="email" class="form-control" id="mail" name="mail" aria-describedby="E-mail usado" value="<?=json_decode($_SESSION['userData'])->mail?>">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-sm-4 py-4">
                <div class="card shadow">
                    <h4 class="display-6 card-header text-center">Cambio de contraseña</h4>
                    <div class="card-body">

                        <!-- ------------------- cambio de contraseña ------------------- -->

                        <form action="<?=$_ENV['PAGE_SERVE']?>/http/controllers/passController.php" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label">Contraseña antigua</label>
                                <input type="password" class="form-control" id="oldPass" name="oldPass" aria-describedby="Nombre usado" value="">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Contraseña nueva</label>
                                <input type="password" class="form-control" id="newPass" name="newPass" aria-describedby="Nombre usado" value="">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Repite la contraseña nueva</label>
                                <input type="password" class="form-control" id="reNewPass" name="reNewPass" aria-describedby="Nombre usado" value="">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-block btn-outline-success">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php

}

?>