<?php
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST['login'])) {
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {    
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailExists = $conn->prepare('SELECT email FROM users WHERE email = :email');
            $emailExists->bindParam(':email', $email);
            $emailExists->execute();
            $resultsEmail = $emailExists->fetchAll(PDO::FETCH_ASSOC);

            if ($emailExists->rowCount() > 0) {
                $passwordExists = $conn->prepare('SELECT password FROM users WHERE email = :email');
                $passwordExists->bindParam(':email', $email);
                $passwordExists->execute();
                $resultsPassword = $passwordExists->fetchColumn();

                if (password_verify($password, $resultsPassword)) {
                    $user = $conn->prepare('SELECT id FROM users WHERE email = :email AND password = :password');
                    $user->bindParam(':email', $email);
                    $user->bindParam(':password', $resultsPassword);
                    $user->execute();
                    $_SESSION["userId"] = $user->fetchColumn();
                    
                    header('Location: ./dashboard.php');
                } else {
                    echo 'Password is wrong';
                }
            } else {
                echo 'This account does not exists.';
            }
        }
    } else if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo 'Email is required';
    } else if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo 'Password is required';
    }   
}
?>