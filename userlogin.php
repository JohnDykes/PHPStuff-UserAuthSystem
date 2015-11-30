<?php
require_once 'classloader.php';
$db = new Database();

if (isset($_POST['loginbtn']) and $db->isConn){
    try {
   $selectedUser = $db->getRow('SELECT * FROM users WHERE email = ?' , [($_POST['email'])]);
        if (!$selectedUser){
            echo 'No user exists with the email entered. Please enter a new email or register.';

        }
        elseif (password_verify($_POST['pass'], $selectedUser->password)){
            Session::setLoginStatus();
            header('location:index.php');
        }
        else{
            echo 'Wrong password';
            $db->Disconnect();
        }
    }

    catch (PDOException $e){
        echo $e->getMessage();
    }

}

?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<p>Please Log in: </p>
<br>
<p>Or <a href="register.php">Register</a> </p>
<form method="post">
    <input type="text" name="email" placeholder="Your Email" required />
    <input type="password" name="pass" placeholder="Your Password" required />
    <input type="submit" name="loginbtn">
</form>