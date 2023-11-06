<?php

namespace db\models {

    include_once("../../http/config/sql.php");
    include_once("userModel.php");

    use db\models\user;

    use controller\sql as sql;

    class peticiones
    {

        private int $id;

        private user $id_user;

        private int $estado;

        /**
         * @var sql $q
         */
        private sql $q;

        public function __construct()
        {
            $this->setQ(new sql);
        }

        /**
         * 
         * retorna un texto en formato json con los datos de la peticion que contiene el objeto
         * 
         * @return string texto en formato json con datos que contiene el objeto
         * 
         */
        public function toJson()
        {

            return json_encode(
                $this->toArray()
            );
        }

        /**
         * 
         * retorna un array con los datos de la peticion que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "id_user" => $this->getIdUser()->toArray(),
                "estado" => $this->getEstado()
            );
        }

        /**
         * 
         * retorna un texto con los datos de la peticion que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString()
        {

            return "'" . $this->getId() .
                "', 'id_user'" . $this->getIdUser()->getId() .
                "', '" . $this->getEstado() . "'";
        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 17/10/2023
         * 
         * @param int $id
         * 
         * @param user $id_user
         * 
         * @param int $estado
         */
        public function setAll(
            int $id,
            user $id_user,
            int $estado
        ) {

            $this->setId($id);
            $this->setIdUser($id_user);
            $this->setEstado($estado);
        }

        /**
         * busca una peticion y retorna un objeto de tipo peticiones que contiene 
         * toda la informacion de este objeto
         * 
         * @param string $op codigo contenido del where que va a hacer la comparacion 
         * el los datos de la base de datos
         * 
         * @since 16/10/2023
         * 
         * @return $this objeto de tipo peticiones
         */
        public function find(string $op)
        {

            try {
                $temp_user = new user;

                $datos = $this->getQ()->where('peticiones', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $d['id'],
                        $temp_user->find("id = ".$d['id_user']),
                        $d['type']
                    );
                }

                return $this;
            } catch (\Throwable $th) {
                echo "Error en peticiones, metodo find fallo: ".$th;

            }
        }

        /**
         * guardar una tupla en la base de datos
         * 
         * @param int $id
         * 
         * @param user $id_user
         * 
         * @param int $estado
         */
        public function save(
            int $id,
            user $id_user,
            int $estado
        ) {

            try {

                $this->setAll(
                    $id,
                    $id_user,
                    $estado
                );

                $columnas = "id, id_user, type";

                $this->getQ()->insert('peticiones', $columnas, $this->toString());
            } catch (\Throwable $th) {
                echo "Error en peticiones, metodo save fallo: ".$th;
            }
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param int $id
         */
        public function delete(int $id)
        {

            $this->getQ()->delete('peticiones', 'id', $id);
        }

        /**
         * Get the value of id
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId(int $id): self
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of id_user
         */
        public function getIdUser(): user
        {
            return $this->id_user;
        }

        /**
         * Set the value of id_user
         */
        public function setIdUser(user $id_user): self
        {
            $this->id_user = $id_user;

            return $this;
        }

        /**
         * Get the value of estado
         */
        public function getEstado(): int
        {
            return $this->estado;
        }

        /**
         * Set the value of estado
         */
        public function setEstado(int $estado): self
        {
            $this->estado = $estado;

            return $this;
        }

        /**
         * Get the value of q
         */
        public function getQ(): sql
        {
            return $this->q;
        }

        /**
         * Set the value of q
         */
        public function setQ(sql $q): self
        {
            $this->q = $q;

            return $this;
        }
    }
}
