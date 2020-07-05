<?php
class Product{
  
    // database connection and table name
    private $conn;
    private $table_name = "products";
  
    // object properties
    public $id; //int
    public $ref; //int
    public $name; //varchar
    public $price; //float
    public $stock; //float
    public $highlight; //int - bool true false
    public $category; //varchar
    public $description; //longtext

  
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
                    ref=:ref, name=:name, price=:price, stock=:stock, highlight=:highlight, category =:category, description=:description";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->ref=htmlspecialchars(strip_tags($this->ref));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->stock=htmlspecialchars(strip_tags($this->stock));
        $this->highlight=htmlspecialchars(strip_tags($this->highlight));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->description=htmlspecialchars(strip_tags($this->description));

    
        // bind values
        $stmt->bindParam(":ref", $this->ref);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":highlight", $this->highlight);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":description", $this->description);
    
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
                    ref     = :ref,
                    name    = :name,
                    price   = :price,
                    stock   = :stock,
                    highlight    : highlight,
                    category    = :category,
                    description = :description
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->ref=htmlspecialchars(strip_tags($this->ref));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->stock=htmlspecialchars(strip_tags($this->stock));
        $this->highlight=htmlspecialchars(strip_tags($this->highlight));
        $this->category=htmlspecialchars(strip_tags($this->category));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind new values
        $stmt->bindParam(":ref", $this->ref);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":highlight", $this->highlight);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":description", $this->description);
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

    function readFavorites($id){

        $query = "SELECT products_id FROM favorites WHERE users_id = ".$id." ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        return $stmt;
    }
}
?>