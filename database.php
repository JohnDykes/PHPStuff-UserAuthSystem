<?php

class Database{
    public $isConn;
    protected $dbase;
    public function __construct($username = 'John', $password = 'password', $options = []){
        $this->isConn = true;
        try{
            $this->dbase = new PDO('mysql:host=localhost;dbname=hops', $username, $password, $options);
            $this->dbase->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->dbase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch (PDOException $e){
            throw new Exception ($e->getMessage());
        }
    }

    public function Disconnect(){
        $this->dbase = null;
        $this->isConn = false;
    }

    public function getRow($query, $params = []){
        try{
            $stmt = $this->dbase->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();

        }
        catch (PDOException $e){
            throw new Exception ($e->getMessage());
        }

    }

    public function getRows($query, $params = []){
        try{
            $stmt = $this->dbase->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();

        }
        catch (PDOException $e){
            throw new Exception ($e->getMessage());
        }
    }

    public function insertRow($query, $params = []){
        try{
            $stmt = $this->dbase->prepare($query);
            $stmt->execute($params);
            return true;

        }
        catch (PDOException $e){
            throw new Exception ($e->getMessage());
        }

    }
    public function updateRow($query, $params = []){
        $this->insertRow($query, $params);
    }
    public function deleteRow($query, $params = []){
        $this->insertRow($query, $params);
    }
}