<?php

namespace db\models {
    
    class credentialsModel{
        
        private $id;

        private $id_user;

        private $credential_type;

        public function __construct() {

        }

        public function toJson(){

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "id_user" =>$this->getIdUser(),
                    "credential_type" => $this->getCredentialType()
                )
            );
            
        }

        public function toArray(){

            return array(
                "id" => $this->getId(),
                "id_user" =>$this->getIdUser(),
                "credential_type" => $this->getCredentialType()
            );

        }

        public function toString(){

            return "id: ".$this->getId().
            ", id_user: ".$this->getIdUser().
            ", credential_type: ".$this->getCredentialType();
            
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
         * Get the value of credential_type
         */
        public function getCredentialType()
        {
                return $this->credential_type;
        }

        /**
         * Set the value of credential_type
         */
        public function setCredentialType($credential_type): self
        {
                $this->credential_type = $credential_type;

                return $this;
        }

    }
    
}