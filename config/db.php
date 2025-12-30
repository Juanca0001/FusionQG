<?php

class Database {

    public static function connect() {
        $db = new mysqli('localhost', 'root', '', 'db_fusionbrasilia');
        try {
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            } else {
                $db->query("SET NAMES 'utf8'");
                return $db;
            }
        } catch (Exception $ex) {
            echo "❌ Error de base de datos: " . $e->getMessage();
            return false;
        }
    }

}
