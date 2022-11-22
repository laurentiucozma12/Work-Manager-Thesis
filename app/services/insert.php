<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST["projectNameSend"])) {
    $id = $_SESSION["userId"];
    $insert = $conn->prepare("INSERT INTO projects (userId, projectName) VALUES ( :userId, :projectName)");
    $insert->bindParam(':userId', $id);
    $insert->bindParam(':projectName', $_POST["projectNameSend"]);
    $insert->execute();
}
    
if (isset($_POST["taskNameSend"])) {
    $insert = $conn->prepare("INSERT INTO tasks (projectId, taskName) VALUES ( :projectId, :taskName)");
	$insert->bindParam(':projectId', $_POST["taskProjectId"]);
    $insert->bindParam(':taskName', $_POST["taskNameSend"]);
    $insert->execute();
}
?>
