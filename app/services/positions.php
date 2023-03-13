<?php
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();
session_start();

if (isset($_POST["updateProjectPosition"])) {

    if(!isset($_POST['oldIndex']) || $_POST['oldIndex'] < 0)
        throw new Exception('Undefined Data');

    if(!isset($_POST['newIndex']) || $_POST['newIndex'] < 0)
        throw new Exception('Undefined Data');

    if(!isset($_POST['projectId']))
        throw new Exception('Undefined Data');

    $oldI = $_POST['oldIndex'];
    $newI = $_POST['newIndex'];
    $projectId = $_POST['projectId'];

    $sql = $conn->prepare("SELECT id, projectPosition FROM projects WHERE userId = :userId ORDER BY projectPosition ASC");
    $sql->bindParam(":userId", $_SESSION["userId"]);
    $sql->execute(); 
    $projects = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $index = 0;
    $indexList = [];
    
    // Assign new positions to all projects except the moved project
    foreach ($projects as $project) {
        if ($project["id"] == $projectId) {
            $indexList[$projectId] = $newI;
        } elseif ($project["projectPosition"] >= $newI && $project["projectPosition"] < $oldI) {
            $indexList[$project["id"]] = $project["projectPosition"] + 1;
        } elseif ($project["projectPosition"] <= $newI && $project["projectPosition"] > $oldI) {
            $indexList[$project["id"]] = $project["projectPosition"] - 1;
        } else {
            $indexList[$project["id"]] = $project["projectPosition"];
        }
    }
    
    
    // Assign new position to the moved project
    $indexList[$projectId] = $newI;

    $sql = $conn->prepare("UPDATE projects SET projectPosition = :projectPosition WHERE id = :id");
    foreach($indexList as $projectId => $position)
    {
        $sql->bindValue(':projectPosition', $position);
        $sql->bindValue(':id', $projectId);
        $sql->execute();
    }  
}
?>