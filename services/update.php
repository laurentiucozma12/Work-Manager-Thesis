<?php 
include 'connect.php';

if (isset($_POST["updateId"])) {
    $sql = $pdo->prepare("SELECT * FROM projects WHERE id = :id");
    $sql->bindParam(":id", $_POST['updateId']);
    $sql->execute();
    $row = $sql->fetch();
    echo json_encode($row);
} 

if (isset($_POST["project_id"])) {
    $sql = $pdo->prepare("UPDATE projects SET projectName = :projectName WHERE id = :id");
    $sql->bindParam(":projectName", $_POST['project_name']);
    $sql->bindParam(":id", $_POST['project_id']);
    $sql->execute();
}

if (isset($_POST["updateIdTask"])) {
    $sql = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
    $sql->bindParam(":id", $_POST['updateIdTask']);
    $sql->execute();
    $row = $sql->fetch();
    echo json_encode($row);
} 

if (isset($_POST["task_id"])) {
    $is_checked = $_POST["task_is_checked"] == "true" ? 1 : NULL;
    $sql = $pdo->prepare("UPDATE tasks SET taskName = :taskName, is_checked = :is_checked WHERE id = :id");
    $sql->bindParam(":taskName", $_POST['task_name']);
    $sql->bindParam(":is_checked", $is_checked);
    $sql->bindParam(":id", $_POST['task_id']);
    $sql->execute();
    echo json_encode(["success" => true]);
}
?>