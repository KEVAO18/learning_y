<?php

namespace http\handler {

    require_once("../../db/models/userModel.php");
    use db\models\user as ModUser;


    class signup
    {

        private $modeloRegistro;

        private $sql;

        public function __construct()
        {
            $this->setModeloRegistro(
                new ModUser
            );
        }

        /**
         * metodo manejador de los regostros, se encarga de comunicar las demas partes del con la base de datos
         */
        public function signUp($nombre, $user, $mail, $pass, $date, $tyc)
        {

            return $this->getModeloRegistro()->save(0, $nombre, $user, $mail, $pass, $date, $tyc);

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
        
        /**
         * Get the value of sql
         */
        public function getSql(){
                return $this->sql;
        }

        /**
         * Set the value of sql
         */
        public function setSql($sql): self{
                $this->sql = $sql;

                return $this;
        }
    }

}

?>