<?php
        $addresses = array(['name'=>'東京太郎','address'=>'東京都','phone'=>'012-345-6789','email'=>'taro@example.com'],['name'=>'工科花子','address'=>'北海道','phone'=>'987-654-3210','email'=>'hana@example@.com']);
        $addresses[] = get_line();
        $json = json_encode($addresses,JSON_UNESCAPED_UNICODE);
        print_r($json);
        print_table($addresses);
        
        function print_table($addresses){
            printf("<table border=1 width=500>");
            printf("<tr>");
            printf("<td>名前</td><td>住所</td><td>電話</td><td>Email</td>");
            printf("</tr>");
            foreach($addresses as $key) {
                foreach($key as $value){
                    printf("<td>".$value."</td>");
                }
                printf("<tr></tr>");
            }
            printf("</table>");
        }
  ?>
        <form method="POST" action="php4.php">
            氏名<input type="text" name="name" id="name" value="">
            住所<input type="text" name="address" id="address" value="">
            電話番号<input type="text" name="phone" id="phone" value="">
            メールアドレス<input type="text" name="email" id="email" value="">
            <input type="submit" name="button1" id="button1" value="送信">
        </form>
        
        <?php
            
            function get_line(){
            if($_POST != null){
                $nline = array('name'=>$_POST['name'],'address'=>$_POST['address'],'phone'=>$_POST['phone'],'email'=>$_POST['email']);
                return $nline;
            }
            else return null;
        }
        ?>