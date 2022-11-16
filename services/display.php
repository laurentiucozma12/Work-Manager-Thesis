<?php 
include 'connect.php';
if (isset($_POST['displaySendProjects'])) {
    echo '<div class="content">';
    $projects = $pdo->prepare("SELECT * FROM projects");
    $projects->execute();
    $results = $projects->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        $id = $result["id"];
        $projectName = $result["projectName"];
        echo
        '<div class="projectAndTaskContainer">
            <div class="projectContainer">   		
                <div id="projectName" class="projectName" placeholder="enter project name">' . $projectName . '</div>

                <div class="actions">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#createTask'.$id.'" class="add"><i class="fas fa-plus fa-xs"></i></button>        
                    <button type="button" href="#" class="edit" onclick="getData('.$id.')"><i class="fas fa-pen fa-xs"></i></button>
                    <button type="button" href="#" class="trash" onclick="deleteProject('.$id.')"><i class="fas fa-trash fa-xs"></i></button>
                </div>
            </div>
            <div class="taskContainer">
            ';		
            $tasks = $pdo->prepare("SELECT * FROM tasks WHERE projectId = :id");
            $tasks->bindParam(":id", $id);
            $tasks->execute();
            $results = $tasks->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                $taskId = $result["id"];
                $taskName = $result["taskName"];                
                $isCheck = $result["is_checked"] ? "checked"  : "" ;
                if ($isCheck == "checked") {
                    '<div style="text-decoration: line-through;">'.$taskName.'</div>';
                }
                echo '<div id="taskName" class="taskName">
                    <div class="d-flex justify-content-between">                            
                        <input type="checkbox"  '. $isCheck . '/>
                        <div class="actions">
                            <button type="button" href="#" class="edit" onclick="getDataTask('.$taskId.')"><i class="fas fa-pen fa-xs"></i></button>
                            <button type="button" href="#" class="trash" onclick="deleteTask('.$taskId.')"><i class="fas fa-trash fa-xs"></i></button>
                        </div>
                    </div>
                ';
                    if ($isCheck == "checked") {
                    echo '<div class="taskText" style="text-decoration: line-through;">' . $taskName . '</div>';
                    } else {
                    echo '<div class="taskText" style="text-decoration: none;">' . $taskName . '</div>';
                    }
                echo '</div>';
            }

            echo '
            <!-- Modal Task -->
            <div class="modal" id="createTask'.$id.'" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="taskName"><h4 class="m-0">Task name</h4></label>
                                <input type="text" class="form-control mt-3 mb-3" id="taskName'.$id.'" placeholder="Enter task name">
                                <input type="hidden" id="taskProjectId'.$id.'" value="'.$id.'"/>
                            </div>
                            
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveTask('.$id.')">Save</button> 
                        </div>                   
                    </div>
                </div>
            </div>

            <!-- Update Modal Task -->
            <div class="modal" id="updateModalTask" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="task_name"><h4 class="m-0">Edit task name</h4></label>
                                <div class="container p-0 d-flex justify-content-between">
                                    <input type="text" id="task_name" class="form-control mt-3 mb-3" placeholder="Enter task name">
                                    <div class="m-3 d-flex justify-content-center">
                                        <div>
                                            <div>Check</div>
                                            <div class="d-flex justify-content-center">                                
                                                <input type="checkbox" id="task_is_checked">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="task_id">
                            </div>
                        
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="updateTask()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';	
    }

    echo '</div>';
}
?>