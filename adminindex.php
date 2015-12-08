<?php
session_start();
require_once 'classloader.php';
$db = new Database();

if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == true && $_SESSION['sessionName'] == 'john') {  //only visible if admin logged in
    Session::showSessionInfo();

    if (isset($_POST['viewallusers'])) {
        $users = $db->getRows('SELECT * FROM users');   //getrows DB function grabs everyone
        foreach ($users as $user) {
            $db->printr($user->username);
        }
    }
    if (isset($_POST['deleteusersubmit'])) {               //Remove a user based on the user's username
        $deletedUser = $_POST['deleteuser'];
        $deletedUser = $db->deleteRow('DELETE FROM `products`.`users` WHERE `users`.`username` = ?', [$deletedUser]);
        echo 'Deleted User: ' . $_POST['deleteuser'];
    }
}
?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Administration Control Panel</title>
</head>
<body>
<form id="adminOptions" name="adminOptions" method="post">
    <label for="viewallusers">View all website users:</label>
    <button type="submit" id="viewallusers" name="viewallusers">View All</button>
    <br>
    <br>
    <label for="deleteuser">Remove user by username:</label>
    <input type="text" id="deleteuser" name="deleteuser" placeholder="Enter username">
    <br>
    <button type="submit" id="deleteuserbtn" name="deleteusersubmit">Delete User</button>
</form>
<br>
<br>
<a href="index.php">Home</a>
<a href="logout.php">Logout</a>

</body>