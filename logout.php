<?php
session_start();             //Unset variables and kill session
session_unset();
session_destroy();

header('location:userlogin.php');