<?php
    $username = 'c0118166';
    $password = 'password';
    $id_num = 3;
    
    $pdo = new PDO('mysql:host=localhost;dbname=address_book;port=8889;charset=utf8',$username,$password);
    
    if(isset($_GET["add_name"])&&isset($_GET["add_address"])&&isset($_GET["add_phone"])&&isset($_GET["add_email"])){
        $name = $_GET["add_name"];
        $address = $_GET["add_address"];
        $phone = $_GET["add_phone"];
        $email = $_GET["add_email"];
        $pdo -> query("INSERT INTO addresses(name,address,phone,email) VALUE('$name','$address','$phone','$email');");
    }
    
    $statement = $pdo -> query("SELECT * FROM addresses");
    $results = $statement->fetchAll();
    $json = json_encode($results,JSON_UNESCAPED_UNICODE);
    print($json);
?>