<?php

class Crud {
    private static $serverName = "localhost";
    private static $uid = "sa";
    private static $pwd = "...";
    private static $database = "CRUD";
    private static $conn = null;

    public static function conect() {
        if (self::$conn === null) {
            $connectionInfo = array(
                "Database" => self::$database,
                "UID" => self::$uid,
                "PWD" => self::$pwd,
                "CharacterSet" => "UTF-8"
            );
            self::$conn = sqlsrv_connect(self::$serverName, $connectionInfo);
            if (self::$conn === false) {
                die('Erro na conexão: ' . print_r(sqlsrv_errors(), true));
            }
        }
        return self::$conn;
    }

    public static function close() {
        if (self::$conn !== null) {
            sqlsrv_close(self::$conn);
            self::$conn = null;
            echo "Conexão Fechada.\n";
        }
    }
}
?>
