<?php

$env = parse_ini_file(__DIR__ . '/.env');
$sql = file_get_contents(__DIR__ . '/database.sql');

$pdo = new PDO(
    'mysql:host=localhost;charset=utf8mb4',
    $env['DB_USER'],
    $env['DB_PASS'],
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

$pdo->exec($sql);

echo "Migration compeleted\n";

