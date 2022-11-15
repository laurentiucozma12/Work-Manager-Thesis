<?php
include 'connect.php';

if (isset($_POST['deleteSend'])) {
    $sql = $pdo->prepare("DELETE FROM projects WHERE id = :id");
    $sql->bindParam(":id", $_POST['deleteSend']);
    $sql->execute();
}

if (isset($_POST['deleteSendTask'])) {
    $sql = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $sql->bindParam(":id", $_POST['deleteSendTask']);
    $sql->execute();
} 

?>