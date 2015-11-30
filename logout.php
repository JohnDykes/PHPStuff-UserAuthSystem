<?php
require_once 'classloader.php';
Session::destroySession();
header('location:userlogin.php');