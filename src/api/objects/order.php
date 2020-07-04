<?php
class Order{
  
    // database connection and table name
    private $conn;
    private $table_name = "orders";
  
    // object properties
    public $id;
    public $ref;
    public $created_at;
    public $Users_id;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    //read function
    function read(){
  
        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }

    // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    ref=:ref, created_at=:created_at, Users_id=:Users_id";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->ref=htmlspecialchars(strip_tags($this->ref));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));
        $this->Users_id=htmlspecialchars(strip_tags($this->Users_id));
    
        // bind values
        $stmt->bindParam(":ref", $this->ref);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":Users_id", $this->Users_id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

        // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    price = :price,
                    description = :description,
                    category = :category
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
        // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
}
?>