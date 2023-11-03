<?php

namespace http\handler {

    try {
        require_once("../../db/models/usu_curModel.php");
        require_once("../../db/models/userModel.php");
        require_once("../../db/models/cursoModel.php");
        require_once("../config/sql.php");
    } catch (\Throwable $th) {
        try {
            require_once("../db/models/usu_curModel.php");
            require_once("../db/models/userModel.php");
            require_once("../db/models/cursoModel.php");
            require_once("../http/config/sql.php");
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    use controller\sql;
    use db\models\curso;
    use db\models\user;
    use db\models\usu_cur;


    class usu_curH
    {

        private usu_cur $modeloOptain;

        private sql $q;

        public function __construct()
        {
            $this->setModeloOptain(
                new usu_cur
            );

            $this->setQ(
                new sql
            );
        }

        /**
         * optener los cursos en un array de todos los cursos
         */
        public function optain($id_user)
        {
            $cursos = array();

            $datos = $this->optainAll($id_user);

            foreach($datos as $d){

                $this->getModeloOptain()->setAll(
                    $d['id'], 
                    (new user)->find("id = ".$d['id_user']), 
                    (new curso)->find("id = ".$d['id_curso']), 
                    $d['estado']
                );

                array_push($cursos, $this->getModeloOptain()->toArray());

            }

            return $cursos;

        }

        function optainAll($id) {
            return $this->getQ()->where('usu_cur', 'id_user = '.$id);
        }

        /**
         * Get the value of modeloOptain
         */
        public function getModeloOptain(): usu_cur
        {
                return $this->modeloOptain;
        }

        /**
         * Set the value of modeloOptain
         */
        public function setModeloOptain(usu_cur $modeloOptain): self
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