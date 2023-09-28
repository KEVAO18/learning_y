<?php

namespace controller{

    use PDO;
    use PDOException;

    try {
        require_once("../../serve.php");
    } catch (\Throwable $th) {
        try {
            require_once("../serve.php");
        } catch (\Throwable $th) {
            require_once("serve.php");
        }
    }
    
    class conection
    {
    
        private $pass;
        private $user;
        private $host;
        private $db;
        private $charset;
        private $con;
    
        public function __construct()
        {
    
            $this->setHost(
                $_ENV['DB_HOST']
            );
    
            $this->setUser(
                $_ENV['DB_USER']
            );
    
            $this->setPass(
                $_ENV['DB_PASS']
            );
    
            $this->setDb(
                $_ENV['DB_NAME']
            );
    
            $this->setCharset(
                $_ENV['DB_CHARSET']
            );
            
            $this->setCon($this->getHost(), $this->getDb(), $this->getUser(), $this->getPass(), $this->getCharset());
        }
    
        /**
         * Get the value of pass
         */
        public function getPass()
        {
            return $this->pass;
        }
    
        /**
         * Set the value of pass
         */
        public function setPass($pass): self
        {
            $this->pass = $pass;
    
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
        public function setUser($user): self
        {
            $this->user = $user;
    
            return $this;
        }
    
        /**
         * Get the value of host
         */
        public function getHost()
        {
            return $this->host;
        }
    
        /**
         * Set the value of host
         */
        public function setHost($host): self
        {
            $this->host = $host;
    
            return $this;
        }
    
        /**
         * Get the value of db
         */
        public function getDb()
        {
            return $this->db;
        }
    
        /**
         * Set the value of db
         */
        public function setDb($db): self
        {
            $this->db = $db;
    
            return $this;
        }
    
        /**
         * Get the value of con
         */
        public function getCon()
        {
            return $this->con;
        }
    
        /**
         * Set the value of con
         */
        public function setCon($host, $database, $username, $password, $charset){
            try {
                $dns = "mysql:host=".$host.";dbname=".$database.";charset=".$charset; // dns para la conexion
    
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  PDO::ATTR_EMULATE_PREPARES => false]; // opciones del pdo
    
                $con = new PDO($dns,  $username, $password, $options); // conexion
    
                $this->con = $con; // objeto resultante
    
            } catch (PDOException $e) {
                
                echo "error en la conexion: ".$e->getMessage();
    
            }
    
        }
    
        function cerrarConexion() {
            
        }
    
        /**
         * Get the value of charset
         */
        public function getCharset()
        {
            return $this->charset;
        }
    
        /**
         * Set the value of charset
         */
        public function setCharset($charset): self
        {
            $this->charset = $charset;
    
            return $this;
        }
    
    }
}
