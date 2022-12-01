<?php 
include '../../app/config/config.php';
include ROOT_PATH.'/app/services/loginService.php';
include ROOT_PATH.'/assets/html/head.php';
?>
<div class='wrap d-flex justify-content-center'>
    <div class='loginRegisterContainer container wrap col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4'>
        <h1 class='mb-4 text-center'>Login</h1>
        <form class='mb-4' method='POST'>
            <div class='mb-3'>
                <label for='exampleInputEmail1' class='form-label'>Email address</label>
                <input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp'>
                <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
            </div>
            <div class='mb-3'>
                <label for='password' class='form-label'>Password</label>
                <input type='password' name='password' class='form-control' id='password'>
                <div id='passwordHelpBlock' class='form-text'>
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type='submit' name='login' class='btn btn-primary'>Login</button>
            </div>
        </form>
        <div class='otherPage d-flex justify-content-center'>
            <a href='<?php echo WEB_PATH; ?>/app/pages/register.php'>Dont have an account? Go to register.</a>
        </div>
    </div>
</div>