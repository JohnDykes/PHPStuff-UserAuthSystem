<?php

spl_autoload_register(function() {
    include_once 'Database.php';
    include_once 'User.php';
    include_once 'Session.php';
    include_once 'Item.php';

});