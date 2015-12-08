<?php
session_start();
require_once 'classloader.php';

if (isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] == true) {  //index only visible if logged in
    Session::showSessionInfo();
} else{
    echo 'Visit login page first.';
    echo "<a href='userlogin.php'>Login</a>";
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
<table id="productsTable" border="1">
    <thead>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
    </thead>
    <tbody>
    </tbody>
</table>


</p>
<br>
<?php
if ($_SESSION['sessionName'] == 'john'){
    echo "<a href='adminindex.php'>Admin CP</a>";
    echo "</br>";
    echo "<a href='userindex.php'>User CP</a>";
}
else{
    echo "<a href='userindex.php'>User CP</a>";
}
?>
<br>
<br>
<a href="logout.php">Logout</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="application/javascript" src="productloaderhelper.js"></script>
</body>
</html>

