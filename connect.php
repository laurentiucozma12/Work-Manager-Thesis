<?php
$hostName = "localhost";
$dbName = "dblicenta";
$userName = "root";
$password = "";
try {
        $pdo = new PDO("mysql:host=$hostName;dbname=$dbName",$userName,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
     echo "Connection failed: " . $e->getMessage();
    }
?>