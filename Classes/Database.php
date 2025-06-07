<?php

class Database{
   
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "books_management";
    public $connection;



    public function connect(){
       $this->connection = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        if($this->connection->connect_error){
            die("Connection Error". $this->connection->connect_error);
        }
        return $this->connection;
    }



}


?>
