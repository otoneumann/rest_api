<?php

class DB {
    private static $instance = null;

    public static function connect() {
        if(self::$instance===null){
            $env = parse_ini_file(__DIR__ . '/.env');

            $dsn = "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']};charset=utf8mb4";

            self::$instance = new PDO(
                $dsn,
                $env['DB_USER'],
                $env['DB_PASS'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        }

        return self::$instance;
    }
}