<?php

namespace http\handler {

    require_once("../../db/models/userModel.php");
    require_once("../config/sql.php");

    use controller\sql as sql;
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

            $this->setSql(
                new sql
            );
        }

        /**
         * metodo manejador de los regostros, se encarga de comunicar las demas partes del con la base de datos
         */
        function signUp($nombre, $user, $mail, $pass, $date, $tyc)
        {

            $this->getModeloRegistro()
                    ->setNombre(
                        "'".$nombre."', "
                    );

            $this->getModeloRegistro()
                    ->setUser(
                        "'".$user."', "
                    );

            $this->getModeloRegistro()
                    ->setMail(
                        "'".$mail."', "
                    );

            $this->getModeloRegistro()
                    ->setPassword(
                        "'".$pass."', "
                    );

            $this->getModeloRegistro()
                    ->setBirthday(
                        "'".$date."', "
                    );

            $this->getModeloRegistro()
                    ->setTyc(
                        "'".$tyc."'"
                    );

            return $this->getSql()
                    ->insert(
                        "usuarios",
                        "name,
                        user,
                        mail,
                        password,
                        birthday,
                        tyc",
                        $this->getModeloRegistro()->getNombre().
                        $this->getModeloRegistro()->getUser().
                        $this->getModeloRegistro()->getMail().
                        $this->getModeloRegistro()->getPassword().
                        $this->getModeloRegistro()->getBirthday().
                        $this->getModeloRegistro()->getTyc()
                    );
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