<?php 

namespace App\Database;
use PDO;

class PDOConnection {
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if(!isset(self::$instance)) {
            try {
                $dsn = "mysql:host=localhost;dbname=pricew";
                $user = 'root';
                $pass = '';

                self::$instance = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
            }catch(PDOException $ex) {
                die($ex->getMessage());
            }
        }

        return self::$instance;
    }
}