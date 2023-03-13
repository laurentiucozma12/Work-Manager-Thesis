<?php 
include "../../app/config/config.php";
include ROOT_PATH."/app/config/connect.php";
include ROOT_PATH."/assets/html/head.php";
?>
<header>
    <nav class="navtop d-flex justify-content-between">
    <div>
        <div class="container m-0 p-0">
            <a>
                <i class="fas fa-cog"></i>
            </a>
            <a class="title">
                <h1>Work Manager</h1>
            </a>
        </div>
    </div>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary navBtn" data-bs-toggle="modal" data-bs-target="#createProject">Create Project</button>
        <form method="post">
            <button class="btn btn-primary logoutBtn navBtn" type="submit" name="logout">Logout</button>
        </form>
    </div>  
</nav>

<?php 
if (isset($_POST["logout"])) {
    session_destroy();
    header('Location: ./login.php');
}
?>
</header>
<main>
<div class="content read">	
        <!-- Modal Project -->
        <div class="modal" id="createProject">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="projectName"><h4 class="m-0">Project name</h4></label>
                            <input name="projectName" class="form-control mt-3 mb-3" id="projectName" placeholder="Enter project name" />
                        </div>
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveProject()">Save</button> 
                    </div>                   
                </div>
            </div>
        </div>

        <!-- Update Modal Project -->
        <div class="modal" id="updateModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_name"><h4 class="m-0">Edit project name</h4></label>
                            <input name="project_name" id="project_name" class="form-control mt-3 mb-3" placeholder="Enter project name"/>
                            <input type="hidden" id="project_id" />
                        </div>
                    
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateProject()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Here will be displayed the projects -->
        <div id="displayDataProjects" class="displayDataProjects d-flex"></div>       
    </div>  
</main>
<?php include ROOT_PATH."/assets/html/footer.php" ?>