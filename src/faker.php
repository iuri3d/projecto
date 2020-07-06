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
        $j = $i + 1;
        $random = rand(0,1);

        ////Insert rows of products
        $sql = 'INSERT INTO products (ref, name, price, stock, highlight, category, description) VALUES ('.$j .',"'.$faker->word.'",'.$faker->randomDigit.','.$faker->randomDigitNotNull.', '.$random.' ,"'.$faker->username.'", "'.$faker->sentence(25).'")';
        $stmt=conn()->prepare($sql);
        $stmt->execute(/*[$j, "name" , 1, 1, 1, "cat", "descr"]*/);  
    }


?>