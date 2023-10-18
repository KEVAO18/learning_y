<?php

namespace db\models {

    use controller\sql as sql;

    class credentialsTypes
    {

        private int $id;

        private string $description;

        private sql $q;

        public function __construct()
        {
        }

        /**
         * 
         * retorna un texto en formato json con los datos de credentialsTypes que contiene el objeto
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
         * retorna un array con los datos de credentialsTypes que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "description" => $this->getDescription()
            );
        }

        /**
         * 
         * retorna un texto con los datos de credentialsTypes que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString()
        {

            return "'" . $this->getId() .
                "', '" . $this->getDescription() . "'";
        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 18/10/2023
         * 
         * @param int  $id
         * 
         * @param string $descipcion
         */
        public function setAll(
            int $id,
            string $descipcion
        ) {
            $this->setId($id);
            $this->setDescription($descipcion);
        }

        /**
         * busca una peticion y retorna un objeto de tipo credentialstypes que contiene 
         * toda la informacion de este objeto
         * 
         * @param string $op codigo contenido del where que va a hacer la comparacion 
         * el los datos de la base de datos
         * 
         * @since 18/10/2023
         * 
         * @return $this objeto de tipo credentialTypes
         */
        public function find(string $op)
        {

            try {

                $datos = $this->getQ()->where('credentialstypes', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $d['id'],
                        $d['description']
                    );
                }

                return $this;
            } catch (\Throwable $th) {
                echo "Error";
            }
        }

        /**
         * guardar una tupla en la base de datos
         * 
         * @param int $id
         * 
         * @param string $descipcion
         */
        public function save(
            int $id,
            string $descipcion
        ) {

            try {

                $this->setAll(
                    $id,
                    $descipcion
                );

                $columnas = "id, description";

                $this->getQ()->insert('credentialstypes', $columnas, $this->toString());
            } catch (\Throwable $th) {
                echo "Error";
            }
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param int $id
         */
        public function delete(int $id)
        {
            $this->getQ()->delete('credentialstypes', 'id', $id);
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
         * Get the value of description
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * Set the value of description
         */
        public function setDescription(string $description): self
        {
            $this->description = $description;

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
