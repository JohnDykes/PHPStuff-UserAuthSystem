<?php
class Session
{

    public static function setSessionName($name){
        if (!isset($_SESSION['sessionName'])) {
        $_SESSION['SessionName'] = $name;
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
    public static function showSessionInfo(){
        echo 'You are logged in as: ' . $_SESSION['SessionName'] ;

    }
    public static function destroySession (){
        session_destroy();
        session_unset();


    }



}