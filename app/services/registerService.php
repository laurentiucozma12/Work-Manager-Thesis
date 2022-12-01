<?php
include ROOT_PATH.'/app/config/connect.php';
$conn = connection();

if (isset($_POST['register'])) {
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password']) && isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repeat_password'])  && !empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {        
        $username = trim($_POST['username']);
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $repeatPassword = trim($_POST['repeat_password']);

        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        $error = false;
        
        $options = array('cost'=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $hashRepeatPassword = password_hash($repeatPassword,PASSWORD_BCRYPT,$options);        
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailExists = $conn->prepare('SELECT email FROM users WHERE email = :email');
            $emailExists->bindParam(':email', $email);
            $emailExists->execute();
            $resultsEmail = $emailExists->fetchAll(PDO::FETCH_ASSOC);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || strlen($password) > 20 || strlen($username) < 2 || strlen($username) > 20 || strlen($firstname) < 2 || strlen($firstname) > 20 || strlen($lastname) < 2 || strlen($lastname) > 20) {
                echo 'Password should be at least 8 characters in length, 20 character maximum and should include at least one upper case letter, one number, and one special character.';
            } else if ($emailExists->rowCount() == 0 && $password == $repeatPassword) {
                $sql = $conn->prepare('INSERT INTO users (username, firstname, lastname, email, password) VALUES (:username, :firstname, :lastname, :email, :password)');                
                $sql->bindParam(':username', $username);
                $sql->bindParam(':firstname', $firstname);
                $sql->bindParam(':lastname', $lastname);
                $sql->bindParam(':email', $email);
                $sql->bindParam(':password', $hashPassword);
                $sql->execute();
                header('Location: ./login.php');
            } else if ($emailExists->rowCount() > 0) { 
                echo 'Email address already registered';
            } else {
                echo 'Passwords do not match';
            }
        }
    } else if (!isset($_POST['username']) || empty($_POST['username'])) {
        echo 'Username is required';
    } else if (!isset($_POST['firstname']) || empty($_POST['firstname'])) {
        echo 'Firstname is required';
    } else if (!isset($_POST['lastname']) || empty($_POST['lastname'])) {
        echo 'Lastname is required';
    } else if(!isset($_POST['email']) || empty($_POST['email'])) {
        echo 'Email is required';
    } else if(!isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['repeat_password']) || empty($_POST['repeat_password'])) {
        echo 'Password is required';
    }
}
?>