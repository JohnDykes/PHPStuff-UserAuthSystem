<?php


class User
{
    public function __construct($username, $email, $password, $mailinglist)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->mailinglist = $mailinglist;
        $this->mailinglist = 0;

    }
}