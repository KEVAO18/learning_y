<?php

namespace db\models {


    include_once("../../http/config/sql.php");
    include_once("userModel.php");
    include_once("cursoModel.php");

    use controller\sql;
    use db\models\user;
    use db\models\curso;

    class usu_cur{
        
        private int $id;
        
        private user $id_user;

        private curso $id_curso;

        private int $state;

        private sql $q;

        public function __construct()
        {
            $this->setQ(new sql);
        }

        /**
         * 
         * retorna un texto en formato json con los datos de usu_cur que contiene el objeto
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
         * retorna un array con los datos de usu_cur que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray()
        {

            return array(
                "id" => $this->getId(),
                "id_user" => $this->getIdUser(),
                "id_curso" => $this->getIdCurso(),
                "state" => $this->getState()
            );

        }

        /**
         * 
         * retorna un texto con los datos de usu_cur que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString()
        {
            return "'".$this->getId().
            "', '".$this->getIdUser()->getId().
            "', '".$this->getState().
            "', '".$this->getIdCurso()->getId()."'";
        }

        /**
         * retorna un array con todas las tuplas de la tabla
         */
        public function getAll() {
            
            try {
                
                $datos = $this->getQ()->All('usu_cur');
                
                $array = array();
                
                foreach ($datos as $d) {
                    $dato = new usu_cur;

                    array_push($array, $dato->find("id = ".$d['id']));
                }
                
                return $array;
                
            } catch (\Throwable $th) {
                
                echo "Error en peticiones, metodo getAll fallo: ".$th;
                
                return array();

            }
        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 18/10/2023
         * 
         * @param int $id
         * 
         * @param user $id_user
         * 
         * @param curso $id_curso
         */
        public function setAll(
            int $id,
            user $id_user,
            curso $id_curso,
            int $state
            ) {
                $this->setId($id);
                $this->setIdUser($id_user);
                $this->setIdCurso($id_curso);
                $this->setState($state);
        }

        /**
         * busca una usu_cur y retorna un objeto de tipo usu_cur que contiene 
         * toda la informacion de este objeto
         * 
         * @param string $op codigo contenido del where que va a hacer la comparacion 
         * el los datos de la base de datos
         * 
         * @since 16/10/2023
         * 
         * @return $this objeto de tipo usu_cur
         */
        public function find(string $op)
        {

            try {
                $temp_user = new user;

                $temp_curso = new curso;

                $datos = $this->getQ()->where('usu_cur', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $d['id'],
                        $temp_user->find("id = ".$d['id_user']),
                        $temp_curso->find("id = ".$d['id_curso']),
                        $d['estado']
                    );
                }

                return $this;
            } catch (\Throwable $th) {
                echo "Error en usu_cur, metodo find fallo: ".$th;
            }
        }

        /**
         * 
         * guardar una tupla en la base de datos
         * 
         * @param int $id
         * 
         * @param user $user
         * 
         * @param curso $curso
         * 
         * @param int $state
         * 
         */
        public function save(
            int $id, 
            user $user, 
            curso $curso, 
            int $state
            ) {
            
                
                try {

                    $this->setId($id);
                    $this->setIdUser($user);
                    $this->setIdCurso($curso);
                    $this->setState($state);
    
                    $columnas = "id, id_user, id_curso, estado";
    
                    $this->getQ()->insert('usu_cur', $columnas, $this->toString());
                    
                } catch (\Throwable $th) {
                    echo "Error en usu_cur, metodo save fallo: ".$th;
                }
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param int $id
         */
        public function delete(int $id)
        {
            $this->getQ()->delete('usu_cur', 'id', $id);
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
         * Get the value of id_curso
         */
        public function getIdCurso(): curso
        {
                return $this->id_curso;
        }

        /**
         * Set the value of id_curso
         */
        public function setIdCurso(curso $id_curso): self
        {
                $this->id_curso = $id_curso;

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
    }
    
}