<?php


class Database
{
    private static ?PDO $pdo = null;

    public static function getPdoConnection(): PDO
    {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = "boutique_en_ligne";
            $user = "root";
            $pass = "";


            try {
                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                self::$pdo = new PDO($dsn, $user, $pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
