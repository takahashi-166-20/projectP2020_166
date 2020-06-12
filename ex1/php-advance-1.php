<!DOCTYPE html>
<html lang = "ja">
<?php
    
?>
<head>
    <meta charset="UTF-8">
    <title>php-advance1</title>
    <style>
  table, tr, th, td {
    border: 1px solid #000;
  }
  
</style>
</head>
<body>
    <?php
        session_start();
        if($_SESSION['accsess']==null){
            printf("初めての訪問です！");
            $_SESSION['accsess'] += 1;
        }
        else{
            $_SESSION['accsess'] += 1;
            print_acsess();
        }

        function print_acsess(){
            $acsess = (int)0;
            $acsess += $_SESSION['accsess'];
            print("<th>");
            print("".$acsess."回目の訪問です！");
            print("</th>\n");
        } 
    ?>
</body>