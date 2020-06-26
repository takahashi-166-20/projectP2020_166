<?php
    if(isset($_POST["text"]))$text = get_text();
    print($text."が送られてきました");
    function get_text(){
        if($_POST["text"]!=null){
            $ntxt = htmlspecialchars($_POST["text"],ENT_QUOTES,"UTF-8");
            return $ntxt;
        }
        else return null;
    }
?>
