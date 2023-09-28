<?php

namespace http\handler {

    require_once("../../db/models/credentialsModel.php");

    require_once("../config/sql.php");

    use controller\sql as sql;
    use db\models\credentialsModel as ModCred;


    class credential
    {

        private $modeloCred;

        private $sql;

        public function __construct()
        {
            $this->setmodeloCred(
                new ModCred
            );

            $this->setSql(
                new sql
            );
        }

        /**
         * metodo manejador de los regostros, se encarga de comunicar las demas partes del con la base de datos
         */
        function addCredential($id_user, $type)
        {

            $this->getmodeloCred()
                    ->setIdUser(
                        "'".$id_user."'"
                    );

            $this->getmodeloCred()
                    ->setCredentialType(
                        "'".$type."'"
                    );

            return $this->getSql()
            ->where(
                "usuarios",
                "id = ".$this->getmodeloCred()->getIdUser()
            );
        }

        /**
         * Get the value of modeloCred
         */
        public function getmodeloCred()
        {
            return $this->modeloCred;
        }

        /**
         * Set the value of modeloCred
         */
        public function setmodeloCred($modeloCred): self
        {
            $this->modeloCred = $modeloCred;

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