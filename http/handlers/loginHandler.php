<?php

namespace http\handler {

    require_once("../../db/models/userModel.php");
    require_once("../config/sql.php");

    use db\models\user as ModUser;


    class login
    {

        private $modeloRegistro;

        public function __construct()
        {
            $this->setModeloRegistro(
                new ModUser
            );
        }

        /**
         * metodo manejador de los regostros, se encarga de comunicar las demas partes del con la base de datos
         */
        function logIn($user, $pass)
        {
            return $this->getModeloRegistro()
                    ->find("user = ".$user." AND password = ".$pass);
        }

        /**
         * Get the value of modeloRegistro
         */
        public function getModeloRegistro()
        {
            return $this->modeloRegistro;
        }

        /**
         * Set the value of modeloRegistro
         */
        public function setModeloRegistro($modeloRegistro): self
        {
            $this->modeloRegistro = $modeloRegistro;

            return $this;
        }
    }
}

?>