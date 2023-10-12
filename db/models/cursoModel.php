<?php

namespace db\models {
    class cursoModel
    {
        
        private $id;

        private $profesor;

        private $nom_curso;

        private $descipcion;

        public function __construct() {
                
        }

        public function toJson(){

			return json_encode(
				array(
					"id" => $this->getId(),
					"profesor" =>$this->getProfesor(),
					"nombre" => $this->getNomCurso(),
					"descripcion" => $this->getDescipcion()
				)
			);

        }

        public function toArray(){

			return array(
					"id" => $this->getId(),
					"profesor" =>$this->getProfesor(),
					"nombre" => $this->getNomCurso(),
					"descripcion" => $this->getDescipcion()
			);

        }

        public function toString(){

			return "id: ".$this->getId().
					", profesor: ".$this->getProfesor().
					", nombre: ".$this->getNomCurso().
					", descripcion: ".$this->getDescipcion();

        }

        public function setAll($id, $profesor, $nom_curso, $descipcion) {

			$this->setId($id);
			$this->setProfesor($profesor);
			$this->setNomCurso($nom_curso);
			$this->setDescipcion($descipcion);

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
         * Get the value of profesor
         */
        public function getProfesor()
        {
                return $this->profesor;
        }

        /**
         * Set the value of profesor
         */
        public function setProfesor($profesor): self
        {
                $this->profesor = $profesor;

                return $this;
        }

        /**
         * Get the value of nom_curso
         */
        public function getNomCurso()
        {
                return $this->nom_curso;
        }

        /**
         * Set the value of nom_curso
         */
        public function setNomCurso($nom_curso): self
        {
                $this->nom_curso = $nom_curso;

                return $this;
        }

        /**
         * Get the value of descipcion
         */
        public function getDescipcion()
        {
                return $this->descipcion;
        }

        /**
         * Set the value of descipcion
         */
        public function setDescipcion($descipcion): self
        {
                $this->descipcion = $descipcion;

                return $this;
        }
    }
}