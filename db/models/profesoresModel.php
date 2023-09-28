<?php

namespace db\models {

    class profesores{
        
        private $id;

        private $id_user;

        public function __construct() {
            
        }

        function toJson() {
            return json_encode(
                array(
                    "id" => $this->getId(),
                    "usuario" =>$this->getIdUser()
                )
            );
        }

        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "usuario" =>$this->getIdUser()
            );

        }

        public function toString()
        {
            return "nombre: ".$this->getId().
            ", usuario: ".$this->getIdUser();
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

    }
    
}