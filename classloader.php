<?php

spl_autoload_register(function() {
    include 'database.php';
    include 'User.php';
});