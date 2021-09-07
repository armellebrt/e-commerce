<?php

namespace Application\Model\Framework;

use \PDO;
use \PDOException;

class Connection
{
    protected static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=Ecom;port=3306", 'root', 'root');
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        return self::$pdo;
    }
}
