<?php

namespace db\models {

    use http\handler\credential;

    class credentialsModel{
        
        private $id;

        private $id_user;

        private $credential_type;

        private $state;

        public function __construct() {

        }

        /**
         * 
         * @return json all data as a json
         * 
        */
        public function toJson(){

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "id_user" =>$this->getIdUser(),
                    "credential_type" => $this->getCredentialType(),
                    "state" => $this->getState()
                )
            );
            
        }

        public function toArray(){

            return array(
                "id" => $this->getId(),
                "id_user" =>$this->getIdUser(),
                "credential_type" => $this->getCredentialType(),
                "state" => $this->getState()
            );

        }

        public function toString(){

            return "'".$this->getId().
            "', '".$this->getIdUser().
            "', '".$this->getCredentialType().
            "', '".$this->getState()."'";
            
        }

        public function setAll($id, $userId, $credential, $state) {
            
            $this->setId($id);
            $this->setIdUser($userId);
            $this->setCredentialType($credential);
            $this->setState($state);

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

        /**
         * Get the value of state
         */
        public function getState()
        {
                return $this->state;
        }

        /**
         * Set the value of state
         */
        public function setState($state): self
        {
                $this->state = $state;

                return $this;
        }

    }
    
}