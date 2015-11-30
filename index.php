<?php
require_once 'classloader.php';
session_start();
if(!isset($_SESSION['sessionName']) and (isset($_SESSION['loginStatus']))) {
    die("Please login");
}

?>
<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles.css">
    <title>Members Only</title>
</head>
<header>
    <?php
      Session::showSessionInfo();
    ?>
</header>

<body>
<p>'Index' page of the site should only be seen by authenticated users coming from the login page.</p>
<br>
<a href="logout.php" style="color: cadetblue">Logout</a>

</body>



</html>

