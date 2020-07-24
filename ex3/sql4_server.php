<?php
    $username = 'c0118166';
    $password = 'password';
    $id_num = 3;
    
    $pdo = new PDO('mysql:host=localhost;dbname=address_book;port=8889;charset=utf8',$username,$password);
    
    if(isset($_GET["add_name"])&&isset($_GET["add_address"])&&isset($_GET["add_phone"])&&isset($_GET["add_email"])){
        $name = $_GET["name"];
        $address = $_GET["address"];
        $phone = $_GET["phone"];
        $email = $_GET["email"];
        $pdo -> query("INSERT INTO addresses VALUE($new_id,'$name','$address','$phone','$email');");
    }
    
    if(isset($_GET["slctname"])){
        $name = $_GET["slctname"];
        $statement = $pdo -> query("SELECT * FROM addresses WHERE name = '$name'");
    }
    else $statement = $pdo -> query("SELECT * FROM addresses");
    $results = $statement->fetchAll();
    
    $json = json_encode($results,JSON_UNESCAPED_UNICODE);
    print($json);
?>