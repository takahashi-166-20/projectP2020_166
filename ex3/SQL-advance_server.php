<?php
    $username = 'c0118166';
    $password = 'password';
    
    $pdo = new PDO('mysql:host=localhost;dbname=address_book;port=8889;charset=utf8',$username,$password);
    
    if(isset($_GET["add_name"])&&isset($_GET["add_address"])&&isset($_GET["add_phone"])&&isset($_GET["add_email"])){
            $name = $_GET["add_name"];
            $address = $_GET["add_address"];
            $phone = $_GET["add_phone"];
            $email = $_GET["add_email"];
            $pdo -> query("INSERT INTO addresses(name,address,phone,email) VALUE('$name','$address','$phone','$email');");    
    }
    
    if(isset($_GET["chg_id"])&&isset($_GET["chg_name"])&&isset($_GET["chg_address"])&&isset($_GET["chg_phone"])&&isset($_GET["chg_email"])){
        $id = $_GET["chg_id"];
        $name = $_GET["chg_name"];
        $address = $_GET["chg_address"];
        $phone = $_GET["chg_phone"];
        $email = $_GET["chg_email"];
        $pdo -> query("UPDATE addresses SET `name`='$name',`address`='$address',`phone`='$phone',`email`='$email' WHERE id ='$id';");
    }
    if(isset($_GET["del_id"])){
        $id = $_GET["del_id"];
        $pdo -> query("DELETE FROM `addresses` WHERE id='$id';");
    }
    if(isset($_GET["del_tag"])&&isset($_GET["del_value"])){
        $tag=$_GET["del_tag"];
        $value=$_GET["del_value"];
        $pdo -> query("DELETE FROM `addresses` WHERE $tag LIKE '$value';");
    }

    if(isset($_GET["slct_tag"])&&$_GET["slct_value"]){
        $tag = $_GET["slct_tag"];
        $value = $_GET["slct_value"];
        $statement = $pdo -> query("SELECT * FROM addresses WHERE $tag LIKE '%$value%'");
    }
    else $statement = $pdo -> query("SELECT * FROM addresses");
    $results = $statement->fetchAll();
    
    $json = json_encode($results,JSON_UNESCAPED_UNICODE);
    print($json);
?>