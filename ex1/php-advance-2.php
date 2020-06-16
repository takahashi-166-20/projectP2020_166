<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset="UTF-8">
    <title>php-advance2</title>
    <style>
  table, tr, th, td {
    border: 1px solid #000;
  }
  
</style>
</head>
<body>
    <?php
    if($_POST != null){
        get_file();
    }
    function get_file(){
        if (is_uploaded_file($_FILES["select_file"]["tmp_name"])) {
            if(move_uploaded_file($_FILES["select_file"]["tmp_name"], $_FILES["select_file"]["name"])) {
                chmod( $_FILES["select_file"]["name"], 0644);
                print("Successful:ファイルのアップロードに成功しました！");
            }
        } else {
            print( "Error:ファイルが選択されていません。");
        }
    }
    ?>
    <form method="POST" action="php-advance-2.php" enctype = "multipart/form-data">
        <p>ファイルアップローダー</p>
        <input type="file" name="select_file" >
        <input type="submit" name="button1" id="button1" value="送信">
    </form>
    
</body>