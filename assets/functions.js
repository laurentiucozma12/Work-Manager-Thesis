// Projects
function saveProject() {
    let projectNameAdd = $('#projectName').val();

    $.ajax({
        url: "insert.php",
        type: 'post',
        data: {
            projectNameSend: projectNameAdd
        },
        success: function(data, status) {
            $('#createProject').modal('hide');

            displayData();
        }
    })
}

function displayData() {
    let displayDataProjects = "true";
    $.ajax({
        url: "display.php",
        type: 'post',
        data: {
            displaySendProjects: displayDataProjects,
        },
        success: function(data, status) {
            $('#displayDataProjects').html(data);
        }
    });
}

function deleteProject(deleteProject) {
    $.ajax({
        url: "delete.php",
        type: 'post',
        data: {
            deleteSend: deleteProject
        },
        success: function (data, status) {
            displayData();
        }
    });
}

function getData(updateId) {
    $.ajax({
        url: "update.php",
        type: 'post',
        data: {
            updateId: updateId
        },
        success: function (data, status) {
            var project = JSON.parse(data);
            $("#project_name").val(project.projectName);
            $("#project_id").val(project.id);
        },
        fail: function() {
            alert("error");
        }
    });

    $('#updateModal').modal('show');
}

function updateProject() {
    var project_name = $('#project_name').val();
    var project_id = $('#project_id').val();

    $.post('update.php', { 
        project_name: project_name,
        project_id: project_id
    },
    
    function(data, status) {
        $('#updateModal').modal('hide');
        displayData();
    });
}

// Tasks
function saveTask(id) {
    let taskNameAdd = $('#taskName' + id).val();
    $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: { 
		taskNameSend: taskNameAdd,
		taskProjectId: id
		},
        success: function (data) { console.log("success"); displayData();},
        error: function (jqXHR, textStatus, errorThrown) { console.log("error"); }
    });
    $('#createTask' + id).modal('hide');
}

function deleteTask(deleteTask) {
    $.ajax({
        url: "delete.php",
        type: 'post',
        data: {
            deleteSendTask: deleteTask
        },
        success: function (data, status) {
            displayData();
        }
    });
}

function getDataTask(updateIdTask) {
    $.ajax({
        url: "update.php",
        type: 'post',
        data: {
            updateIdTask: updateIdTask
        },
        success: function (data, status) {
            var task = JSON.parse(data);
            $("#task_name").val(task.taskName);
            $("#task_id").val(task.id);  
            if (task.is_checked == 1) {
                $("#task_is_checked").attr('checked', 'checked');
            } else {
                $("#task_is_checked").removeAttr("checked");
            }
        },
        fail: function() {
            alert("error");
        }
    });

    $('#updateModalTask').modal('show');
}

function updateTask() {
    var task_name = $('#task_name').val();
    var task_id = $('#task_id').val();    
    var task_is_checked = $("#task_is_checked").is(':checked') ? true : false;

    $.ajax({
        url: "update.php",
        type: 'post',
        dataType: "json",
        data: {
            task_name: task_name,
            task_id: task_id,
            task_is_checked: task_is_checked
        },
        success: function (data, status) {
            console.log("success");
            $('#updateModalTask').modal('hide');
            displayData();
        },
        error: function (request, status, error) {            
            console.log("error");
            $('#updateModalTask').modal('hide');
            displayData();
        }

    });
}