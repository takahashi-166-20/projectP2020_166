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
        $statement = $pdo -> query("SELECT * FROM addresses WHERE id LIKE '%$id%'");
        $results = $statement->fetchAll();
        if($_GET["chg_name"] == "") $name=$results[0]["name"];
        else $name = $_GET["chg_name"];
        if($_GET["chg_address"] == "") $address=$results[0]["address"];
        else $address = $_GET["chg_address"];
        if($_GET["chg_phone"] == "") $phone=$results[0]["phone"];
        else $phone = $_GET["chg_phone"];
        if($_GET["chg_email"] == "") $email=$results[0]["email"];
        else $email = $_GET["chg_email"];
        $pdo -> query("UPDATE addresses SET `name`='$name',`address`='$address',`phone`='$phone',`email`='$email' WHERE id ='$id';");
        // $json = json_encode($results,JSON_UNESCAPED_UNICODE);
        // print($json);
        // exit;
    }

    if(isset($_GET["slct_name"])){
        $name = $_GET["slct_name"];
        $statement = $pdo -> query("SELECT * FROM addresses WHERE name LIKE '%$name%'");
    }
    elseif(isset($_GET["slct_id"])){
        $id = $_GET["slct_id"];
        $statement = $pdo -> query("SELECT * FROM addresses WHERE id LIKE '%$id%'");
    }
    else $statement = $pdo -> query("SELECT * FROM addresses");
    $results = $statement->fetchAll();
    
    $json = json_encode($results,JSON_UNESCAPED_UNICODE);
    print($json);
?>