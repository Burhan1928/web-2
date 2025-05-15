<?php

use Dba\Connection as DbaConnection;

require_once 'config.php';

class Connection {
    public static function make($host, $db, $user, $password) {
        $dsn = "mysql:host;name=$db;charset=utf-8";

        try {
            $option = [PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION];
            return new PDO($dsn, $user, $password, $option);
        } catch (PDOexception $e) {
            die($e->getMessage());
        }
        }
    }

    return Connection::make($host, $db, $user, $password);