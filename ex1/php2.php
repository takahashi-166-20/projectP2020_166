
        <?php
        $addresses = array(['name'=>'東京太郎','address'=>'東京都','phone'=>'012-345-6789','email'=>'taro@example.com'],['name'=>'工科花子','address'=>'北海道','phone'=>'987-654-3210','email'=>'hana@example@.com']);
        //print_table($addresses);
        $json = json_encode($addresses,JSON_UNESCAPED_UNICODE);
        print_r($json);
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
        