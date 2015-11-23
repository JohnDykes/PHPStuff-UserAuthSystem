<?php
require_once 'classloader.php';
$db = new Database();

if (isset($_POST['loginbtn']) and $db->isConn){
    try {
   $selectedUser = $db->getRow('SELECT * FROM users WHERE email = ?' , [($_POST['email'])]);

        if (password_verify($_POST['pass'], $selectedUser->password)){
            echo 'logged in';
            $db->Disconnect();
        }
        else{
            echo 'wrong password';
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
    <script type="application/javascript" src="myScript.js"></script>
    <title>Login</title>
</head>
<p>Please Log in: </p>
<form method="post">
    <input type="text" name="email" placeholder="Your Email" required />
    <input type="password" name="pass" placeholder="Your Password" required />
    <input type="submit" name="loginbtn">
</form>