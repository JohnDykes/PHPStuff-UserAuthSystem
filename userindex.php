<?php
session_start();
require_once 'classloader.php';

if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == true) {  //only visible if logged in
    Session::showSessionInfo();
} else{
    echo 'Visit login page first.';
    echo "<a href='userlogin.php'>Login</a>";
    die;
}

$db = new Database();   //Grab current user and user object
$currentUser = $db->getRow('SELECT * FROM users WHERE username = ?', [$_SESSION['sessionName']]);
$currentUser = new User($currentUser->username, $currentUser->email, $currentUser->password, $currentUser->mailinglist); //Setting up the User object

if (isset($_POST['pwsubmitbtn'])){              //Set up some variables, check to make sure new password matches, hash the new password and update the row
    $newPW = $_POST['newpw'];
    $newPWCheck = $_POST['newpwcheck'];
    $userName = $currentUser->username;
    if ($newPW == $newPWCheck){
        $newPW = password_hash($newPW, PASSWORD_DEFAULT);

        if ($db->updateRow('UPDATE  `users` SET  `password` = ? WHERE `username` = ?',[$newPW, $userName])){

            echo 'Password Changed. Please: ';
            echo "<a href='userlogin.php'>Login</a>";
        }
    }
    else{
        echo 'Passwords do not match';
    }
}
?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>User Control Panel</title>
</head>
<body>
<form id="pwForm" method="post">
    <label>New Password:</label>
    <input type="password" name="newpw">
    <br>
    <label>Confirm New Password</label>
    <input type="password" name="newpwcheck">
    <button type="submit" name="pwsubmitbtn">Change Password</button>
</form>
<a href="index.php">Home</a>
<a href="logout.php">Logout</a>
</body>