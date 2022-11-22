<?php
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST['deleteSend'])) {    
    $id = $_SESSION["userId"];
    $sql = $conn->prepare("DELETE FROM projects WHERE userId = :userId AND id = :id");
    $sql->bindParam(":userId", $id);
    $sql->bindParam(":id", $_POST['deleteSend']);
    $sql->execute();
}

if (isset($_POST['deleteSendTask'])) {
    $sql = $conn->prepare("DELETE FROM tasks WHERE id = :id");
    $sql->bindParam(":id", $_POST['deleteSendTask']);
    $sql->execute();
} 

?>