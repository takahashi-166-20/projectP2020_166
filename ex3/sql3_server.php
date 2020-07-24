<?php
    $username = 'c0118166';
    $password = 'password';
    $id_num = 3;
    
    $pdo = new PDO('mysql:host=localhost;dbname=address_book;port=8889;charset=utf8',$username,$password);
    $pdo -> query("CREATE TABLE addresses (
        id INTEGER NOT NULL auto_increment,
        name	VARCHAR(32) NOT NULL,
        address VARCHAR(50) NOT NULL,
        phone   VARCHAR(32) NOT NULL,
        email   VARCHAR(32) NOT NULL,
        PRIMARY KEY(id)
        );
        INSERT INTO addresses VALUE(1,'東京太郎', '東京都', '012-345-6789','taro@exsample.com');
        INSERT INTO addresses VALUE(2,'工科花子', '北海道', '987-654-3210', 'hana@example.com');
        ");
    if(isset($_GET["name"])&&isset($_GET["address"])&&isset($_GET["phone"])&&isset($_GET["email"])){
        $cnt = $pdo -> query("SELECT COUNT(*) FROM addresses;");
        $id = $cnt->fetchAll();
        $new_id = $id[0][0]+1;
        $name = $_GET["name"];
        $address = $_GET["address"];
        $phone = $_GET["phone"];
        $email = $_GET["email"];
        var_dump($new_id);
        $pdo -> query("INSERT INTO addresses VALUE($new_id,'$name','$address','$phone','$email');");
    }
    $statement = $pdo -> query("SELECT * FROM addresses");
    $results = $statement->fetchAll();
    
    $json = json_encode($results,JSON_UNESCAPED_UNICODE);
    print($json);
?>