<?php

namespace ArmadilloEstates\Database;


abstract class Database
{
    private const HOST = "DB";
    private const USERNAME = "root";
    private const PASSWORD = "password";
    private const DBNAME = "armadilloEstates";

    public static function connect(): \PDO
    {
        $db = new \PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME,self::USERNAME,self::PASSWORD);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        return $db;
    }
}