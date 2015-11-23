<?php
require_once 'classloader.php';

$db = new Database();
if (isset($_POST['signupbtn']) and $db->isConn)
{
   $currentUser = new User($_POST['uname'],($_POST['email']),($_POST['pass']),($_POST['mailcheck']));
   try{
       $userExistsQuery = $db->getRow('SELECT * FROM users WHERE username = ?', [$currentUser->username]);
       if ($userExistsQuery)
       {
           echo 'User Name already exists';
           die;
       }
       else{
           $registerUser = $db->insertRow('INSERT INTO users (username, email, password, mailinglist) VALUES (?, ?, ?, ?)',
               [$currentUser->username,
               $currentUser->email,
               $currentUser->password,
               $currentUser->mailinglist]);
           if ($registerUser){
               echo 'Thanks for registering';
               header('location:userlogin.php');
           }
           else{
               echo 'Register Failed';
           }
       }
   }
   catch (PDOException $e){
       print_r($e);
   }
}
?>

<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="styles.css">
    <script type="application/javascript" src="myScript.js"></script>
    <title>Register Page</title>
</head>
<body>
<p>Register</p>
<form id="registerForm" method=post>
    <input type="text" name="uname" placeholder="User Name" required/>
    <input type="email" name="email" placeholder="Your Email" required/>
    <input type="password" name="pass" placeholder="Your Password" required/>
    <label for="mailcheck">Subscribe to our mailing list?</label>
    <input type="checkbox" name="mailcheck">
    <br>
    <input type="submit" name="signupbtn">
</form>

</body>
</html>