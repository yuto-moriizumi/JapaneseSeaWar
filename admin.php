<?php
error_reporting(0);
mb_language("ja");
mb_internal_encoding('UTF-8');

//JSから受信
$url=$_POST["data"];
$command = explode(",",$_POST["data"],2); //命令取り出し

if( strcmp($command[0], "addProvince") == 0 ){ //マップクリック処理
    $fp = fopen('provinces.csv', 'a');
    fwrite($fp,$command[1].",\n");
    fclose($fp);
    print "Success";
}else if( strcmp($command[0], "declareWar") == 0 ){ //マップクリック処理
    $fp = fopen('wars.csv', 'a');
    fwrite($fp,$command[1]."\n");
    fclose($fp);
    print "Success";
}else{
    print "Failed";
}
?>