<?php

Trait Database {

    protected function connect() {
        try {
            $dbh = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPWD);      // DBHOST, DBNAME, DBUSER, DBPWD are constants defined in config.php
            return $dbh;
        }
        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
            die();
        }
    }

    public function query($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);   // supply data if available
        if($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result;
            }
            else {
                return false;
            }
        }
    }

    // function to get a single row
    public function get_row($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);   // supply data if available
        if($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result[0];
            }
            else {
                return false;
            }
        }
    }
}