<?php



namespace db\models {
    
    require_once("../../http/config/sql.php");

    use controller\sql as sql;


    /**
     * 
     * clase modelo de el objeto usuario
     * 
     */
    class user
    {

        
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

        public function __construct(){
            $this->setQ(
                new sql
            );
        }


        /**
         * 
         * retorna un array con los datos del usuario que contiene el objeto
         * 
         * @return array array de los daros que contiene el objeto
         * 
         */
        public function toArray(){
            
            return array(
                "id" => $this->getId(),
                "nombre" => $this->getNombre(),
                "usuario" =>$this->getUser(),
                "mail" => $this->getMail(),
                "password" => $this->getPassword(),
                "birthday" => $this->getBirthday(),
                "tyc" => $this->getTyc()
            );
            
        }

        /**
         * 
         * retorna un texto en formato json con los datos del usuario que contiene el objeto
         * 
         * @return string texto en formato json con daros que contiene el objeto
         * 
         */
        public function toJson(){

            return json_encode(
                $this->toArray()
            );

        }
        
        public function toString(){

            return "'".$this->getId().
            "', '".$this->getNombre().
            "', '".$this->getUser().
            "', '".$this->getMail().
            "', '".$this->getPassword().
            "', '".$this->getBirthday().
            "', '".$this->getTyc()."'";

        }

        public function save(
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

                $columnas = "id, name, user, mail, password, birthday, tyc";

                $this->getQ()->insert('usuarios', $columnas, $this->toString());
        }

        public function delete(int $id) {

            $this->getQ()->delete('usuarios', 'id', $id);

        }

        /**
         * Get the value of the id
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of the id
         */
        public function setId(int $id): self
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of nombre
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * Set the value of nombre
         */
        public function setNombre(string $nombre): self
        {
            $this->nombre = $nombre;

            return $this;
        }

        /**
         * Get the value of user
         */
        public function getUser()
        {
            return $this->user;
        }

        /**
         * Set the value of user
         */
        public function setUser(string $user): self
        {
            $this->user = $user;

            return $this;
        }

        /**
         * Get the value of mail
         */
        public function getMail()
        {
            return $this->mail;
        }

        /**
         * Set the value of mail
         */
        public function setMail(string $mail): self
        {
            $this->mail = $mail;

            return $this;
        }

        /**
         * Get the value of password
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password
         */
        public function setPassword(string $password): self
        {
            $this->password = $password;

            return $this;
        }

        /**
         * Get the value of birthday
         */
        public function getBirthday()
        {
            return $this->birthday;
        }

        /**
         * Set the value of birthday
         */
        public function setBirthday(string $birthday): self
        {
            $this->birthday = $birthday;

            return $this;
        }

        /**
         * Get the value of tyc
         */
        public function getTyc()
        {
            return $this->tyc;
        }

        /**
         * Set the value of tyc
         */
        public function setTyc(string $tyc): self
        {
            $this->tyc = $tyc;

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
