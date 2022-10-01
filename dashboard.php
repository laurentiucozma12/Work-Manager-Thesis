<?php
include "connect.php";
// Connect to MySQL database
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Work Manager</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css" type="text/css">
    <link rel="stylesheet" href="assets/font.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome.css" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="icon" href="assets/logo.svg" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-v5.1.3.css">
    
</head>
<body>
<header>
<nav class="navtop d-flex justify-content-between">
    <div>
        <div class="container">
            <a href=".">
                <i class="fas fa-cog"></i>
            </a>
            <a href="." class="title">
                <h1>Work Manager</h1>
            </a>
        </div>
    </div>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProject">
        Create Project
        </button>
    </div>  
</nav>
</header>    
<main>    
    <div class="content read">	
        <!-- Modal Project -->
        <div class="modal" id="createProject" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="projectName"><h4 class="m-0">Project name</h4></label>
                            <input type="text" class="form-control mt-3 mb-3" id="projectName" placeholder="Enter project name">
                        </div>
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveProject()">Save</button> 
                    </div>                   
                </div>
            </div>
        </div>

        <!-- Update Modal Project -->
        <div class="modal" id="updateModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_name"><h4 class="m-0">Edit project name</h4></label>
                            <input type="text" id="project_name" class="form-control mt-3 mb-3" placeholder="Enter project name">
                            <input type="hidden" id="project_id">
                        </div>
                    
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateProject()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Here will be displayed the projects -->
        <div id="displayDataProjects" class="displayDataProjects">
            <div id="displayDataTasks" class="displayDataTasks"></div> 
        </div>       
    </div>  
</main>
<footer>
    <div class="copyright">© 2022 Copyright of Laurentiu Ioan Cozma</div>
    <div class="rest"></div>
</footer>

<!-- Bootstrap JS -->
<script src="assets/jquery-v3.2.1.slim.min.js"></script>
<script src="assets/popper-v1.12-9.js"></script>
<script src="assets/bootstrap-v5.1.3.js"></script>

<!-- Ajax jQuery -->
<script src="assets/ajax-jquery-v3.6.0.min.js"></script>

<!-- functions -->
<script src="assets/functions.js"></script>

<script>
$(document).ready(function() {
    displayData();
});

let deleteId;
deleteProject(deleteId);
</script>
</body>
</html>