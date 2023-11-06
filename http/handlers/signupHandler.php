<?php

namespace http\handler {

    require_once("../../db/models/userModel.php");
    require_once("credentialHandler.php");

    use db\models\credentialsTypes;
    use db\models\user as ModUser;
    use http\handler\credential;


    class signup
    {

        private ModUser $modeloRegistro;

        private credential $credH;

        public function __construct()
        {

            $this->setModeloRegistro(
                new ModUser
            );

            $this->setCredH(
                new credential
            );

        }

        /**
         * metodo manejador de los regostros, se encarga de comunicar las demas partes del con la base de datos
         */
        public function signUp($nombre, $user, $mail, $pass, $date, $tyc)
        {
            $i = 0;

            try {
                $datos = $this->getModeloRegistro()
                ->find(
                    "user = '".$user."'"
                );
    
                if(($datos->getUser() != NULL)){
                    return 2;
                }
    
            } catch (\Throwable $th) {
                try {
                    $datos = $this->getModeloRegistro()
                    ->find(
                        "mail = '".$mail."'"
                    );
        
                    if(($datos->getMail() != NULL)){
                        return 3;
                    }
                } catch (\Throwable $th) {

                    $this->getModeloRegistro()
                    ->save(
                        0, 
                        $nombre, 
                        $user, 
                        $mail, 
                        $pass, 
                        $date, 
                        $tyc
                    );

                    $this->getCredH()->addCredential(
                        $this->getModeloRegistro()->find(
                            "user = '".$user."'"
                        ),
                        (new credentialsTypes)->find("id = 5")
                    );

                    return 1;
                    
                }
            }
        }

        /**
         * Get the value of modeloRegistro
         */
        public function getModeloRegistro(): ModUser
        {
            return $this->modeloRegistro;
        }

        /**
         * Set the value of modeloRegistro
         */
        public function setModeloRegistro(ModUser $modeloRegistro): self
        {
            $this->modeloRegistro = $modeloRegistro;

            return $this;
        }

        /**
         * Get the value of credH
         */
        public function getCredH(): credential
        {
            return $this->credH;
        }

        /**
         * Set the value of credH
         */
        public function setCredH(credential $credH): self
        {
            $this->credH = $credH;

            return $this;
        }

    }

}

?>