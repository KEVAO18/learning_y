<?php

namespace db\models {

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

        public function __construct(){

        }

        public function toJson()
        {

            return json_encode(
                array(
                    "id" => $this->getId(),
                    "nombre" => $this->getNombre(),
                    "usuario" =>$this->getUser(),
                    "mail" => $this->getMail(),
                    "password" => $this->getPassword(),
                    "birthday" => $this->getBirthday(),
                    "tyc" => $this->getTyc()
                )
            );
        }

        public function toArray()
        {

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

        public function toString()
        {
            return "'".$this->getId().
            ", nombre: ".$this->getNombre().
            ", usuario: ".$this->getUser().
            ", mail: ".$this->getMail().
            ", password: ".$this->getPassword().
            ", birthday: ".$this->getBirthday().
            ", tyc: ".$this->getTyc();
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
    }
}
