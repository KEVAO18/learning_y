<?php

namespace db\models {

require_once("../../http/config/sql.php");

use controller\sql as sql;

    class peticionesModel{

        private $id;

        private $id_user;

        private $estado;

		/**
         * @var sql $q
         */
        private sql $q;
        
        public function __construct() {
            
        }

		/**
         * 
         * retorna un texto en formato json con los datos del usuario que contiene el objeto
         * 
         * @return string texto en formato json con datos que contiene el objeto
         * 
         */
        public function toJson(){

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "id_user" =>$this->getIdUser(),
                    "estado" => $this->getEstado()
                )
            );
            
        }

		/**
         * 
         * retorna un array con los datos del usuario que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray(){

            return array(
                "id" => $this->getId(),
                "id_user" =>$this->getIdUser(),
                "estado" => $this->getEstado()
            );

        }

		/**
         * 
         * retorna un texto con los datos del usuario que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString(){

            return "id".$this->getId().
                ", id_user".$this->getIdUser().
                ", estado".$this->getEstado();
            
        }

		/**
         * busca un usuario y retorna un objeto de tipo user que contiene 
         * toda la informacion de este usuario
         * 
         * @param string $op
         * 
         * @since 16/10/2023
         * 
         * @return $this objeto de tipo user
         */
        public function find(string $op) {

            $datos = $this->getQ()->where('peticiones', $op);

            foreach ($datos as $d) {
                $this->setId($d['id']);
                $this->setIdUser($d['id_user']);
                $this->setEstado($d['type']);
            }

            return $this;

        }

		/**
         * guardar una tupla en la base de datos
		 * 
		 * @param int $id
		 * 
		 * @param int $id_user
		 * 
		 * @param int $estado
         */
		public function save(
			int $id,
			int $id_user,
			int $estado
			) {
            
			$this->setId($id);
			$this->setIdUser($id_user);
			$this->setEstado($estado);

			$columnas = "id, id_user, type";

			$this->getQ()->insert('peticiones', $columnas, $this->toString());
        }

		/**
		 * elimina tupla de la base de datos
		 * 
		 * @param int $id
		 */
		public function delete(int $id) {

            $this->getQ()->delete('peticiones', 'id', $id);

        }

        /**
         * Get the value of id
         */
        public function getId(){
			return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self{
			$this->id = $id;

			return $this;
        }

        /**
         * Get the value of id_user
         */
        public function getIdUser(){
			return $this->id_user;
        }

        /**
         * Set the value of id_user
         */
        public function setIdUser($id_user): self{
			$this->id_user = $id_user;

			return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado(){
			return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado($estado): self{
			$this->estado = $estado;

			return $this;
        }

		/**
         * Get the value of q
         */
        public function getQ(): sql{
			return $this->q;
		}

		/**
		 * Set the value of q
		 */
		public function setQ(sql $q): self{
			$this->q = $q;

			return $this;
		}

    }
    

}