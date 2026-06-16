<?php

require __DIR__ . '/db.php';

try {
    $pdo = DB::connect();
    echo "DB connection OK\n";
} catch (Exception $e) {
    echo "DB connection FAILED\n";
    echo $e->getMessage();
}
