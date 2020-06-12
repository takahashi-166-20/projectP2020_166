<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>php5</title>
    <style>
  table, tr, th, td {
    border: 1px solid #000;
  }
</style>
</head>
<body>
    <?php
    $addresses = array();
    if(file_exists("addresses.json")==true){
        $fp = "addresses.json";
        $addresses = json_decode(file_get_contents($fp),true);
        if(get_line() != null){
            $fp = "addresses.json";
            $addresses[] = get_line();
            $json = json_encode($addresses,JSON_UNESCAPED_UNICODE);
            file_put_contents($fp,$json);
            print_table($addresses);
        }
        else{
        $fp=fopen("addresses.json","r");
        $json = fgets($fp);
        $addresses = json_decode($json,true);
        print_table($addresses);
        fclose($fp);
        }
    }
    else{
        if($_POST != null){
            $fp = fopen("addresses.json","a");
            $addresses[] = get_line();
            $json = json_encode($addresses,JSON_UNESCAPED_UNICODE);
            fwrite($fp,$json);
            print_table($addresses);
            fclose($fp);
        }
        else print("\"addresses.json\" is not exist");
    }
    
    function print_table($addresses){
        printf("<table>");
        printf("<tr>");
        printf("<th>名前</th><th>住所</th><th>電話</th><th>Email</th>");
        printf("</tr>");
        foreach($addresses as $key) {
            printf("<tr>");
            printf("<td>".$key['name']."</td>");
            printf("<td>".$key['address']."</td>");
            printf("<td>".$key['phone']."</td>");
            printf("<td>".$key['email']."</td>");
            printf("</tr>");                
        }
        printf("</table>");
    }
    ?>

    <?php        
        function get_line(){
        if($_POST != null){
            $nline = array('name'=>$_POST['name'],'address'=>$_POST['address'],'phone'=>$_POST['phone'],'email'=>$_POST['email']);
            return $nline;
        }
        else {return null;}
    }
    ?>

<form method="POST" action="php5.php">
        氏名<input type="text" name="name" id="name" value="">
        住所<input type="text" name="address" id="address" value="">
        電話番号<input type="text" name="phone" id="phone" value="">
        メールアドレス<input type="text" name="email" id="email" value="">
        <input type="submit" name="button1" id="button1" value="送信">
</form>
    

</body>
</html>