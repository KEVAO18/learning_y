<?php

namespace db\models {

    include_once(__DIR__."/../../http/config/sql.php");
    include_once(__DIR__."/userModel.php");
    include_once(__DIR__."/credentialtypesModel.php");

    use db\models\user;
    use db\models\credentialsTypes;
    use controller\sql;

    class credentials
    {

        private int $id;

        private user $id_user;

        private credentialsTypes $credential_type;

        private int $state;

        private sql $q;

        public function __construct()
        {
            $this->setQ(new sql);
        }

        /**
         * 
         * retorna un texto en formato json con los datos de credentials que contiene el objeto
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
         * retorna un array con los datos de credentials que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "id_user" => $this->getIdUser(),
                "credential_type" => $this->getCredentialType(),
                "state" => $this->getState()
            );
        }

        /**
         * 
         * retorna un texto con los datos de credentials que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString()
        {

            return "'" . $this->getId() .
                "', '" . $this->getIdUser()->getId() .
                "', '" . $this->getCredentialType()->getId() .
                "', '" . $this->getState() . "'";
        }

        /**
         * retorna un array con todas las tuplas de la tabla
         */
        public function getAll() {

            try {
                
                $datos = $this->getQ()->All('credentials');
                
                $array = array();
    
                foreach ($datos as $d) {
                    $dato = new credentials;

                    array_push($array, $dato->find("id = ".$d['id']));
                }
    
                return $array;

            } catch (\Throwable $th) {

                echo "Error en credentials, metodo getAll fallo: ".$th;
                
                return array();

            }


        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 18/10/2023
         * 
         * @param int  $id
         * 
         * @param user  $userId
         * 
         * @param credentialsTypes  $credential
         * 
         * @param int $state
         */
        public function setAll(
            int $id,
            user $userId,
            credentialsTypes $credential,
            int $state
        ) {

            $this->setId($id);
            $this->setIdUser($userId);
            $this->setCredentialType($credential);
            $this->setState($state);
        }

        /**
         * busca un credential y retorna un objeto de tipo credentials que contiene 
         * toda la informacion de este objeto
         * 
         * @param string $op codigo contenido del where que va a hacer la comparacion 
         * el los datos de la base de datos
         * 
         * @since 16/10/2023
         * 
         * @return $this objeto de tipo credentials
         */
        public function find(string $op)
        {

            try {
                $temp_user = new user;
                $temp_credentype = new credentialsTypes;

                $datos = $this->getQ()->where('credentials', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $d['id'],
                        $temp_user->find("id =".$d['id_user']),
                        $temp_credentype->find("id = ".$d['credential_type']),
                        $d['state']
                    );
                }

                return $this;
            } catch (\Throwable $th) {
                echo "Error en credentials, metodo find fallo: ".$th;
            }
        }

        /**
         * 
         * guardar una tupla en la base de datos
         * 
         * @param int $id
         * 
         * @param user $userId
         * 
         * @param credentialsTypes $credential
         * 
         * @param int $state
         * 
         */
        public function save(
            int $id,
            user $userId,
            credentialsTypes $credential,
            int $state
        ) {

            try {
                $this->setId($id);
                $this->setIdUser($userId);
                $this->setCredentialType($credential);
                $this->setState($state);

                $columnas = "id, id_user, credential_type, state";

                $this->getQ()->insert('credentials', $columnas, $this->toString());
            } catch (\Throwable $th) {
                echo "Error en credentials, metodo save fallo: ".$th;
            }
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param int $id
         */
        public function delete(int $id)
        {

            $this->getQ()->delete('credentials', 'id', $id);
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
         * Get the value of credential_type
         */
        public function getCredentialType(): credentialsTypes
        {
            return $this->credential_type;
        }

        /**
         * Set the value of credential_type
         */
        public function setCredentialType(credentialsTypes $credential_type): self
        {
            $this->credential_type = $credential_type;

            return $this;
        }

        /**
         * Get the value of state
         */
        public function getState(): int
        {
            return $this->state;
        }

        /**
         * Set the value of state
         */
        public function setState(int $state): self
        {
            $this->state = $state;

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
