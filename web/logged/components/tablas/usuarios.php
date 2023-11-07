<?php

namespace web\logged\components\tablas{

    // use http\handler\cursoH;
    class usuarios
    {

        public function __construct() {
            
        }

        public function porCargo($datos, $cargo) {
            
            ?>

            <h3 class="text-center py-4"><?=$cargo?></h3>
            
            <table class="table table-hover">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>mail</th>
                    <?=(json_decode($_SESSION['userCred'])->description == "Administrador")? "<th>acciones</th>" : ""?>
                </tr>
                <?php

                foreach ($datos as $d) {
                    
                    if ($d->getCredentialType()->getDescription() == $cargo) {
                        ?>
                    
                        <tr>
                            <td><?=$d->getIdUser()->getId()?></td>
                            <td><?=$d->getIdUser()->getNombre()?></td>
                            <td>@<?=$d->getIdUser()->getUser()?></td>
                            <td><?=$d->getIdUser()->getMail()?></td>
                            <td>
                                <?php
                                if(json_decode($_SESSION['userCred'])->description == "Administrador"){
                                    ?>
                                    <!-- <a href="" class="btn btn-outline-danger">ban</a> -->
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
    
                        <?php
                    }

                }

                ?>
            </table>
            
            <?php
        }

        public function all($datos) {
            
            ?>
            
            <table class="table table-hover">
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>mail</th>
                    <?=(json_decode($_SESSION['userCred'])->description == "Administrador")? "<th>acciones</th>" : ""?>
                </tr>
                <?php

                foreach ($datos as $d) {
                    
                    ?>
                    <tr>
                        <td><?=$d->getIdUser()->getId()?></td>
                        <td><?=$d->getIdUser()->getNombre()?></td>
                        <td>@<?=$d->getIdUser()->getUser()?></td>
                        <td><?=$d->getIdUser()->getMail()?></td>
                    </tr>
                    <?php
                    

                }

                ?>
            </table>
            
            <?php
        }
    }
}