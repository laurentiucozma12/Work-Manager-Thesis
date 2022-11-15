<?php 
include 'connect.php';

if (isset($_POST["projectNameSend"])) {
    $insert = $pdo->prepare("INSERT INTO projects (projectName) VALUES (:projectName)");
    $insert->bindParam(':projectName', $_POST["projectNameSend"]);
    $insert->execute();
}
    
if (isset($_POST["taskNameSend"])) {
    $insert = $pdo->prepare("INSERT INTO tasks (projectId, taskName) VALUES ( :projectId, :taskName)");
	$insert->bindParam(':projectId', $_POST["taskProjectId"]);
    $insert->bindParam(':taskName', $_POST["taskNameSend"]);
    $insert->execute();
}
?>
