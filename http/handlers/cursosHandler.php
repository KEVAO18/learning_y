<?php

namespace http\handler {

    try {
        require_once("../../db/models/cursoModel.php");
        require_once("../config/sql.php");
    } catch (\Throwable $th) {
        try {
            require_once("../db/models/cursoModel.php");
            require_once("../http/config/sql.php");
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    use controller\sql;
    use db\models\curso;
    use db\models\user;

    class cursoH
    {

        private curso $modeloOptain;

        private sql $q;

        public function __construct()
        {
            $this->setModeloOptain(
                new curso
            );

            $this->setQ(
                new sql
            );
        }

        /**
         * optener los cursos en un array de todos los cursos
         */
        public function optain()
        {
            $cursos = array();

            $datos = $this->getQ()->All("cursos");

            foreach ($datos as $d) {

                array_push($cursos, $this->opptainOne($d['id']));

            }

            return $cursos;

        }

        function opptainOne($id) {
            return $c = (new curso)->find("id = ".$id);
        }

        public function newCurso(
            $id_profesor, 
            $nom_curso, 
            $desc, 
            $content
            ) {
            try {
                $this->getModeloOptain()->save(
                    0,
                    (new user)->find("id = ".$id_profesor),
                    $nom_curso,
                    $desc,
                    $content
                );
                return "ok";
            } catch (\Throwable $th) {
                return "Error en newCurso: ".$th;
            }
        }

        /**
         * Get the value of modeloOptain
         */
        public function getModeloOptain(): curso
        {
                return $this->modeloOptain;
        }

        /**
         * Set the value of modeloOptain
         */
        public function setModeloOptain(curso $modeloOptain): self
        {
                $this->modeloOptain = $modeloOptain;

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

?>