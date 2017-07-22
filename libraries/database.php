<?php

class Database {

    public $host = DB_HOST;
    public $user = DB_USER;
    public $passwd = DB_PASS;
    public $dsn = DSN;
    public $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
    public $link;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->link = new PDO($this->dsn, $this->user, $this->passwd, $this->options);
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function select($query) {
        try {
            $result = $this->link->query($query);
            return $result;
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }

    public function insert($query) {
        try {
            $this->link->exec($query);
            header("location:index.php?msg=".  urlencode('Successfully Added'));
            exit();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function updtae($query) {
        try {
            $this->link->query($query);
            header("location:index.php?msg=".  urlencode('Successfully Updated'));
            exit();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function delete($query) {
        try {
            $this->link->query($query);
            header("location:index.php?msg=".  urlencode('Successfully Deleted'));
            exit();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
