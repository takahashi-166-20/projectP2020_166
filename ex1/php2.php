<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>php2</title>
    <style>
  table, tr, th, td {
    border: 1px solid #000;
  }
</style>
</head>
<body>
    <?php
        $addresses = array(['name'=>'東京太郎','address'=>'東京都','phone'=>'012-345-6789','email'=>'taro@example.com'],['name'=>'工科花子','address'=>'北海道','phone'=>'987-654-3210','email'=>'hana@example@.com']);
        print_table($addresses);
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
</body>
</html>

        