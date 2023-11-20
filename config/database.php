<?php

class Database{

    private static $instance = null;
    

    private $host = "randion.es";
    private $db_name = "sestacio_php_loogin_system";
    private $username = "sestacio";
    private $password = "Secretos.2023";

    public $conn;
    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    public static function getConnection()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance->conn;
    }


}














?>