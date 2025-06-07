<?php


require_once "classes/Database.php";

class Books{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    public function getAll(){
        return $this->connection->query("SELECT * FROM books");
    }
    public function getById($isbn){
        return $this->connection->query("SELECT * FROM books WHERE isbn = $isbn");

    }
    public function add($title,$copyright,$edition,$price,$qty){

        $stmt = $this->connection->prepare("INSERT INTO books(title,copyright,edition,price,qty) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sissi",$title,$copyright,$edition,$price,$qty);

        if($stmt->execute()){
            return "Books added successfully";
        }else{
            return "Error adding book";
        }
    }

    public function update($isbn,$title,$copyright,$edition,$price,$qty){
        
        $stmt = $this->connection->prepare("UPDATE books SET title = ?,copyright = ? , edition = ?, price = ?, qty = ? WHERE isbn = $isbn");
        $stmt->bind_param("sissi",$title,$copyright,$edition,$price,$qty);
        
        if($stmt->execute()){
            return "Books updated successfully";
        }else{
            return "Error updating book";
        }
    }

    public function searchBook($isbn){
        $isbn = $this->connection->real_escape_string($isbn);
        return $this->connection->query("SELECT * FROM books WHERE isbn = $isbn");
    }

    public function delete($isbn){
        
        $stmt= $this->connection->prepare("DELETE  FROM books WHERE isbn = ? ");
        $stmt->bind_param("i",$isbn);
         if($stmt->execute()){
            return "Books deleted successfully";
        }else{
            return "Error deleting book";
        }
    }
    
}



?>
