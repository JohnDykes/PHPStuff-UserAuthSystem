<?php
class Session
{

    public static function setSessionName($name){

        if (empty($_SESSION['sessionName'])) {
            $_SESSION['sessionName'] = $name;
        }   else {
            return $_SESSION['sessionName'];
        }
    }
    public static function setLoginStatus(){
        if(!isset($_SESSION['loginStatus'])){
            $_SESSION['loginStatus'] = true;
        } else{
            return false;
        }
    }
    public static function showSessionInfo()
    {
        echo 'Logged in as: ' . $_SESSION['sessionName'];
    }

}