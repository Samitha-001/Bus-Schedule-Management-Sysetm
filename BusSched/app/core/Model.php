<?php

// main model class
class Model
{
    use Database;       // use the trait Database
    protected $table            = "";
    protected $allowedColumns   = ["id"];
    protected $limit            = 100;
    protected $offset           = 0;
    protected $order_type       = "ASC";
    protected $order_column     = "id";
    public $errors           = [];
    public function findAll() {
        // $query = "SELECT * FROM $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset"; // commented until pagination is implemented

        $query = "SELECT * FROM $this->table order by $this->order_column $this->order_type";
        return $this->query($query);
    }

    public function where($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";       // '.' is used to add to query
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }
        $query = trim($query, " && ");

        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";       // :id is a placeholder in PDO
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    // return one row
    public function first($data, $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";       // '.' is used to add to query
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }
        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";       // :id is a placeholder in PDO
        $data = array_merge($data, $data_not);
        
        $result = $this->query($query, $data);
        if ($result) {
            return $result[0];
        }
        else {
            return false;
        }
    }

    // read n rows
    public function findN($limit, $order_column='id') {
        $query = "SELECT * FROM $this->table order by $order_column $this->order_type limit $limit";

        return $this->query($query);
    }
    

    public function insert($data) {
        
        // removes unwanted data
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);     // deletes item from the list
                }
                if ($value == '') {
                    unset($data[$key]);   // deletes item from the list if it is empty
                }
            }
            unset($data['id']);
        }
        
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (".implode(',', $keys).") VALUES (:".implode(',:', $keys).")";        // implode returns a string from an array
        // print_r($query);
        $this->query($query, $data);
        return false;
    }

    public function insertMany($dataArray) {
        // construct a multi-row insert query
        $keys = array_keys(reset($dataArray));
        $values = array();
        foreach ($dataArray as $data) {
            // removes unwanted data
            if (!empty($this->allowedColumns)) {
                foreach ($data as $key => $value) {
                    if (!in_array($key, $this->allowedColumns) || $value == '') {
                        unset($data[$key]);
                    }
                }
                unset($data['id']);
            }
            $values[] = "('" . implode("', '", $data) . "')";
        }
        $query = "INSERT INTO $this->table (".implode(',', $keys).") VALUES " . implode(",", $values);
        $this->query($query);
        return false;
    }
    
    

    public function update($id, $data, $id_column = 'id') {
        // removes unwanted data
        if(!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);     // deletes item from the list
                }
            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
        
        foreach ($keys as $key) {
            $query .= $key . " = :". $key . ", ";       // '.' is used to add to query
        }
        $query = trim($query, ", ");
        
        $query .= " WHERE $id_column = :$id_column";
        
        $data[$id_column] = $id;
        // show($data);
        // show($query);
        $this->query($query, $data);
        return false;
    }

    public function delete($id, $id_column = 'id') {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";
        
        $this->query($query, $data);
        return false;
    }

    // findall from a table
    public function findAllFromTable($table2) {
        $query = "SELECT * FROM $table2";

        return $this->query($query);
    }

    // function to join tables
    public function join($table2, $c1, $c2, $data = [], $data_not = []) {
        $query = "SELECT * FROM $this->table JOIN $table2 ON $c1 = $c2 WHERE ";
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        if (!$data && !$data_not)
            // remove "where" from the query
            $query = substr($query, 0, -7);

        foreach ($keys as $key) {
            $query .= $key . " = :". $key . " && ";       // '.' is used to add to query
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :". $key . " && ";
        }
        $query = trim($query, " && ");

        $query .= " order by $this->table.$this->order_column $this->order_type limit $this->limit offset $this->offset";       // :id is a placeholder in PDO
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }
}