<?php

namespace db\models {

    include_once("../../http/config/sql.php");
    include_once("userModel.php");
    include_once("cursoModel.php");

    use db\models\user;
    use db\models\curso;
    use controller\sql;

    class creador_curso{

        private user $id_user;

        private curso $id_curso;
        
        private sql $q;

        public function __construct()
        {
            $this->setQ(new sql);
        }

        /**
         * 
         * retorna un texto en formato json con los datos de creador_curso que contiene el objeto
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
         * retorna un array con los datos de creador_curso que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray()
        {

            return array(
                "id_user" => $this->getIdUser(),
                "id_curso" => $this->getIdCurso()
            );

        }

        /**
         * 
         * retorna un texto con los datos de creador_curso que contiene el objeto
         * 
         * @return string texto con datos que contiene el objeto
         * 
         */
        public function toString()
        {
            "'".$this->getIdUser()->getId().
            "', '".$this->getIdCurso()->getId()."'";
        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 18/10/2023
         * 
         * @param user $id_user
         * 
         * @param curso $id_curso
         */
        public function setAll(
            user $id_user,
            curso $id_curso
            ) {
                $this->setIdUser($id_user);
                $this->setIdCurso($id_curso);
        }

        /**
         * busca un creador_curso y retorna un objeto de tipo creador_curso que contiene 
         * toda la informacion de este objeto
         * 
         * @param string $op codigo contenido del where que va a hacer la comparacion 
         * el los datos de la base de datos
         * 
         * @since 16/10/2023
         * 
         * @return $this objeto de tipo creador_curso
         */
        public function find(string $op)
        {

            try {
                $temp_user = new user;

                $temp_curso = new curso;

                $datos = $this->getQ()->where('creador_curso', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $temp_user->find("id = ".$d['id_user']),
                        $temp_curso->find("id = ".$d['id_curso'])
                    );
                }

                return $this;
            } catch (\Throwable $th) {
                echo "Error en Creador_curso, metodo find fallo: ".$th;
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
            user $user, 
            curso $curso
            ) {
            
                try {
                    $this->setIdUser($user);
                    $this->setIdCurso($curso);

                    $columnas = "id_user, id_curso";

                    $this->getQ()->insert('creador_curso', $columnas, $this->toString());
                } catch (\Throwable $th) {
                    echo "Error en Creador_curso, metodo save fallo: ".$th;
                }
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param user $id
         */
        public function deletePorUser(user $id)
        {
            $this->getQ()->delete('creador_curso', 'id_user', $id->getId());
        }

        /**
         * elimina tupla de la base de datos
         * 
         * @param curso $id
         */
        public function deletePorCurso(curso $id)
        {
            $this->getQ()->delete('creador_curso', 'id_curso', $id->getId());
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

    }

}
