<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/config/connect.php';
include ROOT_PATH.'/app/services/DateHelper.php';
$conn = connection();

if (isset($_POST['displaySendProjects'])) {

    $id = $_SESSION["userId"];
    $sql = $conn->prepare("SELECT * FROM projects WHERE userId = :userId ORDER by projectPosition ASC");
    $sql->bindParam(":userId", $id);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) { 

        $id = $result["id"];
        $projectName = $result["projectName"];
        $projectPosition = $result["projectPosition"];
        $sql = $conn->prepare("UPDATE projects SET projectPosition = :projectPosition  WHERE id = :id");
        $sql->bindParam(":id", $_POST[$id]);
        $sql->bindParam(":projectPosition", $_POST[$projectPosition]);           
        $sql->execute();

        if (isset($_POST['update'])) {

            foreach($_POST['positions'] as $position) {

                $index = $position[0];
                $newPosition = $position[1];
        
                $sql = $conn->prepare("UPDATE projects SET projectPosition = :projectPosition  WHERE id = :id");
                $sql->bindParam(":id", $_POST[$index]);
                $sql->bindParam(":projectPosition", $_POST[$newPosition]);           
                $sql->execute();
            }
        
            exit('success');
        }

        echo '<div class="projectAndTaskContainer grabbable" data_id="'.$id.'">
            
            <div class="container">            
                <div class="projectContainer d-flex justify-content-between">   		
                    <div id="projectName" class="projectName" placeholder="enter project name" onclick="getData('.$id.')">'.$projectName.'</div>

                    <div class="actions d-flex align-items-center">
                        <button class="add" type="button" data-bs-toggle="modal" data-bs-target="#createTask'.$id.'"><i class="fa-solid fa-plus"></i></button>  
                        <button class="trash" type="button" href="#" onclick="deleteProject('.$id.')"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>

                <table id="sortableTasks" class="taskContainer">
                    <tbody id="tasksArea'.$id.'" class="tasksArea">';

                        $tasks = $conn->prepare("SELECT * FROM tasks WHERE projectId = :id");
                        $tasks->bindParam(":id", $id);
                        $tasks->execute();
                        $results = $tasks->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $result) {

                            $taskId = $result["id"];
                            $taskName = $result["taskName"];     
                            $taskDescription = $result["taskDescription"];   
                            $taskDateTime = $result["date_time"];   
                            $isCheck = $result["is_checked"] ? "checked"  : "" ;

                            echo '<tr id="taskName" class="taskName">          
                                <td>  
                                    <div class="taskContainer">
                                        <div class="actions d-flex justify-content-between ">    
                                            <div class="open-modal d-flex align-items-center w-100" onclick="getDataTask('.$taskId.')">                            
                                                <label for="status" class="status">Status:</label>
                                                <input style="pointer-events: none;" class="me-3" name="status" type="checkbox" '.$isCheck.'/>';
                                                if ($taskDateTime > "0000-00-00 00:00:00") {

                                                    // $showDate = date('d M', strtotime($taskDateTime));
                                                    $showDate = DateHelper::format($taskDateTime, 'dd MMMM');
                                                    $currentDate = date('Y-m-d');
                                                    $choosenDate = date('Y-m-d', strtotime($taskDateTime));

                                                    if((DateHelper::compareModifyBool($currentDate, $choosenDate, null, null, DateHelper::COMPARE_TYPE_FIRST_BIGGER)
                                                        || DateHelper::compareBool($currentDate, $choosenDate, DateHelper::COMPARE_TYPE_EQUAL))
                                                        && !$isCheck) {
                                                        echo '<div class="red-bg flatpickr-container">'.$showDate.'</div>';  
                                                    } else if (DateHelper::compareModifyBool($choosenDate, $currentDate, null, null, DateHelper::COMPARE_TYPE_DIFF, "2") && !$isCheck) {
                                                        echo '<div class="yellow-bg flatpickr-container">'.$showDate.'</div>';                                                        
                                                    } else {
                                                        echo '<div class="green-bg flatpickr-container">'.$showDate.'</div>'; 
                                                    }
                                                }
                                            echo '</div>

                                            <div>
                                                <button type="button" href="#" class="trash" onclick="deleteTask('.$taskId.')"><i class="fa-solid fa-trash"></i></button>
                                            </div>

                                        </div>

                                        <div class="taskTextContainer" onclick="getDataTask('.$taskId.')">';                            
                                            if ($isCheck == "checked") 
                                            {
                                                echo '<div class="taskText taskTitle text-center" style="text-decoration: line-through;">'.$taskName.'</div>';
                                            } 
                                            else 
                                            {
                                                echo '<div class="taskText taskTitle text-center" style="text-decoration: none;">'.$taskName.'</div>';
                                            }
                                        echo '</div>                                        
                                    </div>             
                                </td>
                            </tr>';
                        }
                    echo' </tbody>
                </table>
            </div>

            <!-- Modal Task -->
            <div class="modal" id="createTask'.$id.'">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="taskName"><h4 class="m-0">Task name</h4></label>
                                <input name="taskName" class="form-control mt-3 mb-3" id="taskName'.$id.'" placeholder="Enter task name" />
                                <label for="taskDescription"><h4 class="m-0">Task description</h4></label>
                                <textarea name="taskDescription" class="form-control mt-3 mb-3" id="taskDescription'.$id.'" placeholder="Enter task description"></textarea>
                            </div>
                            
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveTask('.$id.')">Save</button> 
                        
                        </div>                   
                    </div>
                </div>
            </div>

            <!-- Update Modal Task -->
            <div class="modal" id="updateModalTask">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group">

                                <label for="task_name"><h4 class="m-0">Edit task name</h4></label> 
                                <input id="task_name" name="task_name" type="text" class="form-control mt-3 mb-3" placeholder="Enter task name" />
                               
                                <div class="container p-0 col-12">                                     
                                    <div class="form-group d-flex align-items-center">
                                        <span class="check-span d-flex align-items-center mb-0 me-2">Check:</span>
                                        <input type="checkbox" id="task_is_checked" class="d-flex align-items-center mb-0 me-3"/>
                                        <div class="flatpickr-container">
                                            <input type="text" id="task_date" name="task_date" prop-selector="flatpickr" class="form-control text-center pt-1 pb-1 ps-0 pe-0" />
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center form-group">
                                        <label for="task_description" class="d-flex align-items-center task-description">
                                            <h4 class="d-flex align-items-center mb-0 me-2">Edit task description</h4>
                                        </label> 
                                    </div>
                                    
                                    <div class="d-flex"> 
                                        <textarea type="text" name="task_description" id="task_description" class="form-control mt-3 mb-3" placeholder="Enter task description"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" id="task_id"/>

                            </div>  

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="updateTask()">Update</button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>