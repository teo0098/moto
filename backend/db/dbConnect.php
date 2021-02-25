<?php
    class DB {
        private $host;
        private $user;
        private $password;
        private $database;
        private $connection;

        public function __construct($host, $user, $password, $database) {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
        }

        public function connect() {
            $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            if (!$this->connection) return false;
            return true;
        }

        public function getConnection() {
            return $this->connection;
        }
    }
?>