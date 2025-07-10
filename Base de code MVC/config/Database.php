<?php

class Database
{

    private static $pdo = null;

    public static function connect()
    {

        if (!self::$pdo) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=boutique-mvc;charset=utf8', 'root', '');
        }
        return self::$pdo;
    }
}

?>