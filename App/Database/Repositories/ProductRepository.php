<?php

namespace App\Database\Repositories;

use App\Database\PDOConnection;
use PDO;

class ProductRepository {
    private $conn;
    private $table;

    public function __construct() {
        $this->conn =  PDOConnection::getInstance();
        $this->table = 'products';
    }

    public function all() {
        $sqlStmt = "SELECT * FROM {$this->table}";
        try {
            $op = $this->conn->prepare($sqlStmt);
            $op->execute();
            $row = $op->fetchAll(PDO::FETCH_OBJ);
            var_dump($row);
        }catch(PDOException $ex) {
            die($ex->getMessage());
        }
    }
}