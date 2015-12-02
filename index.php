<?php
session_start();
require_once 'classloader.php';

if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == true) {
    Session::showSessionInfo();
} else{
    echo 'Visit login page first.';
    die;

}
?>
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Members Only</title>
</head>
<header>
</header>

<body>
<ul>
    <p>Products list will go here.</p>


</ul>
<br>
<a href="logout.php">Logout</a>

</body>

</html>

