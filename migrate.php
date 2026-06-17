<?php

$env = parse_ini_file(__DIR__ . '/.env');

$pdo = new PDO(
    'mysql:host=localhost;charset=utf8mb4',
    $env['DB_USER'],
    $env['DB_PASS'],
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

$migrationsDir = __DIR__ . '/migrations';

$files = scandir($migrationsDir);

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
        $sql = file_get_contents($migrationsDir . '/' . $file);
        //var_dump($file);
        //die;
        echo "Running migration: $file\n";
        $pdo->exec($sql);
/*        var_dump($sql);
        die;*/
    }
}


echo "All Migrations compeleted\n";

