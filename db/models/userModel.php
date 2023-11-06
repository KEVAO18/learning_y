<?php

namespace db\models {

    include_once("../../http/config/sql.php");

    use controller\sql as sql;

    /**
     * 
     * clase modelo de el objeto usuario
     * 
     * @since 28/09/2023
     * 
     * @version 1.2
     * 
     * @author KEVAO18
     * 
     * @method find(string $op)
     * 
     * @method toArray()
     * 
     * @method toJson()
     * 
     * @method toString()
     * 
     * @method save(int $id, string $nombre, string $user, string $mail, string $password, string $birthday, string $tyc)
     * 
     * @method delete(int $id)
     */
    class user{
        
        /**
         * @var string $id
         */
        private string $id;

        /**
         * @var string $nombre
         */
        private string $nombre;

        /**
         * @var string $user
         */
        private string $user;

        /**
         * @var string $mail
         */
        private string $mail;

        /**
         * @var string $password
         */
        private string $password;

        /**
         * @var string $birthday
         */
        private string $birthday;

        /**
         * @var string $tyc
         */
        private string $tyc;

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
         * retorna un array con los datos del usuario que contiene el objeto
         * 
         * @return array array de los datos que contiene el objeto
         * 
         */
        public function toArray(){
            
            return array(
                "id" => $this->getId(),
                "name" => $this->getNombre(),
                "user" =>$this->getUser(),
                "mail" => $this->getMail(),
                "birthday" => $this->getBirthday(),
                "tyc" => $this->getTyc()
            );
            
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
                $this->toArray()
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

            return "'".$this->getId().
            "', '".$this->getNombre().
            "', '".$this->getUser().
            "', '".$this->getMail().
            "', '".$this->getPassword().
            "', '".$this->getBirthday().
            "', '".$this->getTyc()."'";

        }

        /**
         * asigna un valor a todos los atributos de la clase
         * 
         * @since 16/10/2023
         * 
         * @param int $id
         * 
         * @param string $nombre
         * 
         * @param string $user
         * 
         * @param string $mail
         * 
         * @param string $password
         * 
         * @param string $birthday
         * 
         * @param string $tyc
         */
        public function setAll(
            int $id, 
            string $nombre, 
            string $user, 
            string $mail, 
            string $password, 
            string $birthday, 
            string $tyc
            ) {
        
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setUser($user);
            $this->setMail($mail);
            $this->setPassword($password);
            $this->setBirthday($birthday);
            $this->setTyc($tyc);

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

            try {
                $datos = $this->getQ()->where('usuarios', $op);

                foreach ($datos as $d) {
                    $this->setAll(
                        $d['id'],
                        $d['name'],
                        $d['user'],
                        $d['mail'],
                        $d['password'],
                        $d['birthday'],
                        $d['tyc']
                    );
                }
    
                return $this;
            } catch (\Throwable $th) {
                echo "Error en user, metodo find fallo: ".$th;
            }

        }

        /**
         * 
         * guardar una tupla en la base de datos
         * 
         * @param int $id
         * 
         * @param string $nombre
         * 
         * @param string $user
         * 
         * @param string $mail
         * 
         * @param string $password
         * 
         * @param string $birthday
         * 
         * @param string $tyc
         * 
         */
        public function save(
            int $id, 
            string $nombre, 
            string $user, 
            string $mail, 
            string $password, 
            string $birthday, 
            string $tyc
            ) {
            
            try {
                $this->setId($id);
                $this->setNombre($nombre);
                $this->setUser($user);
                $this->setMail($mail);
                $this->setPassword($password);
                $this->setBirthday($birthday);
                $this->setTyc($tyc);

                $columnas = "id, name, user, mail, password, birthday, tyc";

                $this->getQ()->insert('usuarios', $columnas, $this->toString());
            } catch (\Throwable $th) {
                echo "Error en user, metodo save fallo: ".$th;
            }
        }

        /**
         * eliminar dato de la base de datos
         * 
         * @param int $id
         */
        public function delete(int $id) {

            $this->getQ()->delete('usuarios', 'id', $id);

        }

        /**
         * actualizar nombre
         * 
         * @param int $id
         * 
         * @param string $newName
         */
        public function updateName( 
            int $id, 
            string $newName
            ) {

                $this->getQ()->update('usuarios', 1, 'name', $id, $newName);

        }

        /**
         * actualizar usuario
         * 
         * @param int $id
         * 
         * @param string $newUser
         */
        public function updateUser( 
            int $id, 
            string $newUser
            ) {

                $this->getQ()->update('usuarios', 1, 'user', $id, $newUser);

        }

        /**
         * actualizar email
         * 
         * @param int $id
         * 
         * @param string $newMail
         */
        public function updatemail( 
            int $id, 
            string $newMail
            ) {

                $this->getQ()->update('usuarios', 1, 'mail', $id, $newMail);

        }

        /**
         * actualizar contraseña
         * 
         * @param int $id
         * 
         * @param string $newPass
         */
        public function updatepass( 
            int $id, 
            string $newPass
            ) {

                $this->getQ()->update('usuarios', 1, 'password', $id, password_hash($newPass, PASSWORD_BCRYPT));

        }

        /**
         * Get the value of the id
         */
        public function getId(){
            return $this->id;
        }

        /**
         * Set the value of the id
         */
        public function setId(int $id): self{
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of nombre
         */
        public function getNombre(){
            return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre(string $nombre): self{
            $this->nombre = $nombre;

            return $this;
        }

        /**
         * Get the value of user
         */
        public function getUser(){
            return $this->user;
        }

        /**
         * Set the value of user
         */
        public function setUser(string $user): self{
            $this->user = $user;

            return $this;
        }

        /**
         * Get the value of mail
         */
        public function getMail(){
            return $this->mail;
        }

        /**
         * Set the value of mail
         */
        public function setMail(string $mail): self{
            $this->mail = $mail;

            return $this;
        }

        /**
         * Get the value of password
         */
        public function getPassword(){
            return $this->password;
        }

        /**
         * Set the value of password
         */
        public function setPassword(string $password): self{
            $this->password = $password;

            return $this;
        }

        /**
         * Get the value of birthday
         */
        public function getBirthday(){
            return $this->birthday;
        }

        /**
         * Set the value of birthday
         */
        public function setBirthday(string $birthday): self{
            $this->birthday = $birthday;

            return $this;
        }

        /**
         * Get the value of tyc
         */
        public function getTyc(){
            return $this->tyc;
        }

        /**
         * Set the value of tyc
         */
        public function setTyc(string $tyc): self{
            $this->tyc = $tyc;

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
