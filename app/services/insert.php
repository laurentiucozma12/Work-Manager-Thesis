<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST["projectNameSend"]) && !empty($_POST["projectNameSend"])) {
    $id = $_SESSION["userId"];
    $sql = $conn->prepare("INSERT INTO projects (userId, projectName) VALUES ( :userId, :projectName)");
    $sql->bindParam(':userId', $id);
    $sql->bindParam(':projectName', $_POST["projectNameSend"]);
    $sql->execute();
}

if (isset($_POST["taskNameSend"]) && !empty($_POST["taskNameSend"])) {
    $sql = $conn->prepare("INSERT INTO tasks (projectId, taskName, taskDescription) VALUES ( :projectId, :taskName, :taskDescription)");
	$sql->bindParam(':projectId', $_POST["taskProjectId"]);
    $sql->bindParam(':taskName', $_POST["taskNameSend"]);
    $sql->bindParam(':taskDescription', $_POST["taskDescriptionSend"]);
    $sql->execute();
}
?>
