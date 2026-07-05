<?php
date_default_timezone_set('America/Lima');
class Database {
      private $host = '127.0.0.1';
    private $db_name = 'gym_system';
    private $username = 'root';
    private $password = 'root'; // Por defecto en Laragon es vacío
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host .";port=8889;dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8mb4");
           $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}