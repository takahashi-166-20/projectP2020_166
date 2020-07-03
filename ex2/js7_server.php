
<?php
    if(isset($_GET["text"]))$text = get_text();
    print($text."が送られてきました");
    
    function get_text(){
        if($_GET["text"]!=null){
            $ntxt = htmlspecialchars($_GET["text"],ENT_QUOTES,"UTF-8");
            return $ntxt;
        }
        else return null;
    }
?>
