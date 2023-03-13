<?php
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST['deleteSend'])) {    
    $id = $_SESSION["userId"];
    $deletedId = $_POST['deleteSend'];

    // Delete the selected div
    $sql = $conn->prepare("DELETE FROM projects WHERE userId = :userId AND id = :id");
    $sql->bindParam(":userId", $id);
    $sql->bindParam(":id", $deletedId);
    $sql->execute();

    // Get the remaining divs and their positions
    $sql = $conn->prepare("SELECT id, projectPosition FROM projects WHERE userId = :userId ORDER BY projectPosition ASC");
    $sql->bindParam(":userId", $id);
    $sql->execute();
    $projects = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Update the positions of the remaining divs
    $newPosition = 0;
    foreach ($projects as $project) {
        $projectId = $project['id'];
        $oldPosition = $project['projectPosition'];
        if ($oldPosition != $newPosition) {
            $sql = $conn->prepare("UPDATE projects SET projectPosition = :position WHERE id = :projectId");
            $sql->bindParam(":position", $newPosition);
            $sql->bindParam(":projectId", $projectId);
            $sql->execute();
        }
        $newPosition++;
    }
}

if (isset($_POST['deleteSendTask'])) {
    $sql = $conn->prepare("DELETE FROM tasks WHERE id = :id");
    $sql->bindParam(":id", $_POST['deleteSendTask']);
    $sql->execute();
} 

?>