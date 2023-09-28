<?php

namespace db\models {

    class peticionesModel{

        private $id;

        private $id_user;

        private $id_cred;

        private $estado;
        
        public function __construct() {
            
        }

        public function toJson(){

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "id_user" =>$this->getIdUser(),
                    "id_cred" => $this->getIdCred(),
                    "estado" => $this->getEstado()
                )
            );
            
        }

        public function toArray(){

            return array(
                "id" => $this->getId(),
                "id_user" =>$this->getIdUser(),
                "id_cred" => $this->getIdCred(),
                "estado" => $this->getEstado()
            );

        }

        public function toString(){

            return "id".$this->getId().
                ", id_user".$this->getIdUser().
                ", id_cred".$this->getIdCred().
                ", estado".$this->getEstado();
            
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of id_user
         */
        public function getIdUser()
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         */
        public function setIdUser($id_user): self
        {
                $this->id_user = $id_user;

                return $this;
        }

        /**
         * Get the value of id_cred
         */
        public function getIdCred()
        {
                return $this->id_cred;
        }

        /**
         * Set the value of id_cred
         */
        public function setIdCred($id_cred): self
        {
                $this->id_cred = $id_cred;

                return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado($estado): self
        {
                $this->estado = $estado;

                return $this;
        }

    }
    

}