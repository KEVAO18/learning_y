<?php

namespace db\models {

    class usu_curModel{
        
        private $id;
        
        private $id_user;

        private $id_curso;

        public function __construct() {

        }

        function toJson() {
            return json_encode(
                array(
                    "id" => $this->getId(),
                    "id_user" => $this->getIdUser(),
                    "id_curso" => $this->getIdCurso()
                )
            );
        }

        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "id_user" => $this->getIdUser(),
                "id_curso" => $this->getIdCurso()
            );

        }

        public function toString()
        {
            return "id".$this->getId().
            ", id_user".$this->getIdUser().
            ", id_curso".$this->getIdCurso();
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
         * Get the value of id_curso
         */
        public function getIdCurso()
        {
                return $this->id_curso;
        }

        /**
         * Set the value of id_curso
         */
        public function setIdCurso($id_curso): self
        {
                $this->id_curso = $id_curso;

                return $this;
        }

    }
    
}