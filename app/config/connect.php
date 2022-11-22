<?php
function connection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $name = 'work_manager';

    try {
        return $pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $name . ';charset=utf8', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected successfully';
    } catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>