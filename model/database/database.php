<?php

class Database
{
    private $host = "localhost";
    private $dbName = "projeto";
    private $username = "root";
    private $pwd = "!Feliz2013,";

    protected function dbConnect()
    {
        try
        {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
            $pdo = new PDO($dsn,$this->username, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch(PDOException $e)
        {
            echo "Db connect error:".$e->getMessage();
        }
    }
}