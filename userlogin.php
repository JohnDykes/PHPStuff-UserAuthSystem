<?php
session_start();
require_once 'classloader.php';

$db = new Database();
if (isset($_POST['loginbtn']) and $db->isConn){ //Is the login button pressed and the database connected?
    try {
        $selectedUser = $db->getRow('SELECT * FROM users WHERE email = ?' , [($_POST['email'])]); //Pull out a user by their email
        if (!$selectedUser){ //If a user cannot be found by entered email, prompt again
            echo 'No user exists with the email entered. Please enter a new email or register.';
        }
        elseif (password_verify($_POST['pass'], $selectedUser->password)){ //If the password matches the hash, set some session variables and bring to index
            Session::setSessionName($selectedUser->username);
            Session::setLoginStatus();
            if ($_SESSION['sessionName'] == 'john'){   //if the user is an admin bring straight to admin index
                header('location:adminindex.php');
                exit;
            }
            else{
            header('location:index.php');
                exit;
            }
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

<form method="post">
    <input type="text" name="email" placeholder="Your Email" required />
    <input type="password" name="pass" placeholder="Your Password" required />
    <input type="submit" name="loginbtn">
</form>

<br>
<br>
<a href="register.php">Register</a>