class Picker {

    constructor ()
    {
        this.propSelector = "prop-selector";
        this.pickerName = "flatpickr";
        this.selector = null;
        this.pickerConfig = {
            enableTime: true,
            time_24hr: true,
            altInput: false,
            altFormat: 'd M Y H:i',
            dateFormat: "Y-m-d H:i",
            onReady: function(dateObj, dateStr, instance) {
                var $cal = $(instance.calendarContainer);
                if ($cal.find('.flatpickr-clear').length < 1) {
                    $cal.append('<div class="flatpickr-clear">Clear</div>');
                    $cal.find('.flatpickr-clear').on('click', function() {
                        instance.clear();
                        instance.close();
                    });
                }
            }
        };

        this.initPicker();
    }

    makeSelector (name)
    {
        if(name)
            return '[prop-selector="'+ name +'"]';
        else
            return false;
    }

    initPicker()
    {
        $(this.makeSelector(this.pickerName)).flatpickr(this.pickerConfig);
    }

    getSelector()
    {
        return this.makeSelector(this.pickerName);
    }
}

function updatePositions(evt) {
    var data = {
        updateProjectPosition: true,
        oldIndex: evt.oldIndex,
        newIndex: evt.newIndex,
        projectId: evt.clone.attributes.data_id.value
    };

    $.ajax({
        url: "/app/services/positions.php",
        type: 'post',
        data: data,
        success: function(data, status) {
            console.log('success');
        },
        error: function() {
            console.log("error");
        }
    });
}

// Sortable
$(document).ready(function(){
    var projectsArea = document.getElementById('displayDataProjects');

    new Sortable(projectsArea, {
	    animation: 150,
        onStart: function (/**Event*/evt) {
            // console.log("Elementul este focusat pentru mutare, si are index: " + evt.oldIndex);
        },
        onEnd: function (/**Event*/evt) {
            updatePositions(evt);
            // console.log("Mutat in lista curenta, de pe index: " + evt.oldIndex + ", pe index:" + evt.newIndex);
        }    
    });
});

// Projects
$(document).ready(function(){
    displayData();  
});

function saveProject() {
    let projectNameAdd = $('#projectName').val();

    $.ajax({
        url: "/app/services/insert.php",
        type: 'post',
        data: {
            updateProject: true,
            projectNameSend: projectNameAdd
        },
        success: function(data, status) {
            $('#createProject').modal('hide');

            displayData();
        }, 
        error: function (jqXHR, textStatus, errorThrown) { 
            var error = jqXHR.responseJSON;
            $('.modal-body').prepend('<p>Title: '+ error.title +'</p>');
            $('.modal-body').prepend('<p>msg: '+ error.message +'</p>');
        }
    })
}

function displayData() {
    let displayDataProjects = "true";

    $.ajax({
        url: "/app/services/display.php",
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
        url: "/app/services/delete.php",
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
        url: "/app/services/update.php",
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
    
    $.post('/app/services/update.php', { 
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
    let taskDescriptionAdd = $('#taskDescription' + id).val();

    $.ajax({
        url: '/app/services/insert.php',
        type: 'POST',
        data: { 
		taskNameSend: taskNameAdd,
		taskDescriptionSend: taskDescriptionAdd,
		taskProjectId: id
		},
        success: function (data) { 
            console.log("success"); 
            displayData();
        },
        error: function (jqXHR, textStatus, errorThrown) { 
            console.log("error"); 
        }
    });
    
    $('#createTask' + id).modal('hide');
}

function deleteTask(deleteTask) {
    $.ajax({
        url: "/app/services/delete.php",
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
        url: "/app/services/update.php",
        type: 'post',
        data: {
            updateIdTask: updateIdTask
        },
        success: function (data, status) {

            var task = JSON.parse(data);

            $("#task_name").val(task.taskName);
            $("#task_description").val(task.taskDescription);
            $("#task_id").val(task.id);  
            $((new Picker()).getSelector()).val(task.date_time); 
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
    var task_id = $('#task_id').val();    
    var task_name = $('#task_name').val();
    var task_description = $('#task_description').val();
    var task_date = $('#task_date').val();
    var task_is_checked = $('#task_is_checked').is(':checked') ? true : false;

    $.ajax({
        url: "/app/services/update.php",
        type: 'post',
        dataType: "json",
        data: {
            task_name: task_name,
            task_description: task_description,
            task_id: task_id,
            task_is_checked: task_is_checked,
            task_date: task_date
        },
        success: function (data, status) {
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