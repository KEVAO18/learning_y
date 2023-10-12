<?php

namespace db\models {
    
    class credentialsTypes{
        
        private $id;

        private $description;

        public function __construct() {

        }

        public function toJson(){

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "description" =>$this->getDescription()
                )
            );
            
        }

        public function toArray(){

            return array(
                "id" => $this->getId(),
                "description" =>$this->getDescription()
            );

        }

        public function toString(){

            return "id: ".$this->getId().
            "description: ".$this->getDescription();
            
        }

        public function setAll($id, $describ) {
            
            $this->setId($id);
            $this->setDescription($describ);

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
         * Get the value of description
         */
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         */
        public function setDescription($description): self
        {
                $this->description = $description;

                return $this;
        }

    }
    
}