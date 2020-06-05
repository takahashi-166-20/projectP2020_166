<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>php4</title>
    <style>
  table, tr, th, td {
    border: 1px solid #000;
  }
</style>
</head>
<body>
    <?php
        $addresses = array(['name'=>'東京太郎','address'=>'東京都','phone'=>'012-345-6789','email'=>'taro@example.com'],['name'=>'工科花子','address'=>'北海道','phone'=>'987-654-3210','email'=>'hana@example@.com']);
        if($_POST != null)$addresses[] = get_line();
        $json = json_encode($addresses,JSON_UNESCAPED_UNICODE);
        var_dump($json);
        print_table($addresses);
        $file_addresses = fopen("addresses.json","w+");
        fwrite($file_addresses,"".$json."");
        fclose($file_addresses);
        
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
            else return null;
        }
    ?>

    <form method="POST" action="php4.php">
            氏名<input type="text" name="name" id="name" value="">
            住所<input type="text" name="address" id="address" value="">
            電話番号<input type="text" name="phone" id="phone" value="">
            メールアドレス<input type="text" name="email" id="email" value="">
            <input type="submit" name="button1" id="button1" value="送信">
    </form>
        
    
</body>
</html>