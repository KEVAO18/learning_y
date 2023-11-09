<?php

namespace http\handler {

    require_once("../../db/models/userModel.php");

    use db\models\user as ModUser;


    class config
    {

        private ModUser $modUser;

        public function __construct() {
            $this->setModUser(
                new ModUser
            );
        }

        public function deleteAccount($id) {
            try {
                $this->getModUser()->delete($id);
                return 0;
            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function updatePersonalI(int $id, string $name, string $user, string $mail) {

            try {
                
                $session = json_decode($_SESSION['userData']);
                
                if($session->name != $name){
                    $d = $this->getModUser()->updateName($id, $name);
                }
                
                if(($session->user != $user)){
                    
                    try {
                        $datos = $this->getModUser()
                            ->find(
                                "user = '".$user."'"
                            );

                        if($datos->getUser() != NULL){
                            return 1;
                        }

                    } catch (\Throwable $th) {
                        $d = $this->getModUser()->updateUser($id, $user);
                        return 0;
                    }
                }

                if(($session->mail != $mail)){
                    
                    try {
                        
                        $datos = $this->getModUser()
                            ->find(
                                "mail = '".$mail."'"
                            );

                        if($datos->getMail() != NULL){
                            return 2;
                        }

                    } catch (\Throwable $th) {
                        $d = $this->getModUser()->updatemail($id, $mail);
                        return 0;
                    }
                }

                return 0;

            } catch (\Throwable $th) {
                
                echo $th;

                return 4;
            }

        }

        public function updatePass(int $id, string $oldPass, string $newPass) {
            
            try {
                
                $session = json_decode($_SESSION['userData']);

                $datos = $this->getModUser()->find("id = ".$session->id);

                if(password_verify($oldPass, $datos->getPassword())){
                    $datos->updatepass($session->id, $newPass);
                    return 0;
                }else{
                    return 1;
                }

            } catch (\Throwable $th) {
                echo $th."<br>";
                return 4;
            }

        }

        /**
         * Get the value of ModUser
         */
        public function getModUser(): ModUser {
            return $this->modUser;
        }

        /**
         * Set the value of ModUser
         */
        public function setModUser(ModUser $modUser): self {
            $this->modUser = $modUser;

            return $this;
        }

    }

}

?>