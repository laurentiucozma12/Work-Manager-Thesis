<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST["projectNameSend"]) && !empty($_POST["projectNameSend"])) {
    $id = $_SESSION["userId"];

    $result = $conn->prepare("SELECT * FROM projects WHERE userId = :userId");
    $result->bindParam(':userId', $id);
    $result->execute();
    $rowCount = $result->rowCount();

    $projectPosition = $rowCount > 0 ? $rowCount : 0;

    $sql = $conn->prepare("INSERT INTO projects (userId, projectName, projectPosition) VALUES ( :userId, :projectName, :projectPosition)");
    $sql->bindParam(':userId', $id);
    $sql->bindParam(':projectName', $_POST["projectNameSend"]);
    $sql->bindParam(':projectPosition', $projectPosition);
    $sql->execute();
}

if (isset($_POST["taskNameSend"]) && !empty($_POST["taskNameSend"])) {
    $sql = $conn->prepare("INSERT INTO tasks (projectId, taskName, taskDescription) VALUES ( :projectId, :taskName, :taskDescription)");
    $sql->bindParam(':projectId', $_POST["taskProjectId"]);
    $sql->bindParam(':taskName', $_POST["taskNameSend"]);
    $sql->bindParam(':taskDescription', $_POST["taskDescriptionSend"]);
    $sql->execute();

    // Update task positions
    $result = $conn->prepare("SELECT taskId FROM tasks WHERE projectId = :projectId ORDER BY taskPosition ASC");
    $result->bindParam(':projectId', $_POST["taskProjectId"]);
    $result->execute();
    $tasks = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tasks as $key => $task) {
        $sql = $conn->prepare("UPDATE tasks SET taskPosition = :taskPosition WHERE taskId = :taskId");
        $sql->bindParam(':taskPosition', $key + 1);
        $sql->bindParam(':taskId', $task['taskId']);
        $sql->execute();
    }
}
?>
