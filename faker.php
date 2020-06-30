<?php

require_once "vendor/autoload.php";

$faker = Faker\Factory::create();

function conn()
{
    $host = 'localhost';
    $db   = 'projeto';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
        $pdo = null;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

    for($i = 0; $i < 35; $i++){
        $sql = "INSERT INTO products (name, description, category, stock, price) 
            VALUES (?,?,?,?,?)";
        
        //sentence(23)

        $stmt=conn()->prepare($sql);
        $stmt->execute([$i, 'fdskjfh dsfh  fsd ', 'abcd', 4, 1.2]);  
    }


?>