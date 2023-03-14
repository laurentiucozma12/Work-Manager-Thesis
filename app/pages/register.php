<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/services/registerService.php';
include ROOT_PATH.'/assets/html/head.php';
?>
<div class='loginRegisterPage wrap d-flex justify-content-center'>
    <div class='loginRegisterContainer container wrap col-12 '>
        <h1 class='mb-4 text-center'>Register</h1>
        <form class='mb-4'  method='POST'>
            <div class='row'>
                <div class="mb-3 col-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required="required">
                </div>
                <div class="mb-3 col-6">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" required="required">
                </div>
                <div class="mb-3 col-6">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" required="required">
                </div>
                <div class='mb-3 col-6'>
                    <label for='email' class='form-label'>Email address</label>
                    <input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp' required="required">
                    <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
                </div>
                <div class='mb-3 col-6'>
                    <label for='password' class='form-label'>Password</label>
                    <input type='password' name='password' class='form-control' id='password' required="required">
                    <div id='passwordHelpBlock' class='form-text'>Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</div>
                </div>
                <div class='mb-3 col-6'>
                    <label for='repeat_password' class='form-label'>Repeat Password</label>
                    <input type='password' name='repeat_password' class='form-control' id='repeat_password' required="required">
                    <div id='passwordHelpBlock' class='form-text'>Passwords must be the same</div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type='submit' name='register' class='btn btn-primary'>Register</button>
            </div>
        </form>
        <div class='otherPage d-flex justify-content-center'>
            <a href='./login.php'>Already have an account? Go to login.</a>
        </div>
    </div>
</div>