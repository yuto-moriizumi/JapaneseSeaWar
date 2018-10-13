<?php
error_reporting(0);
mb_language("ja");
mb_internal_encoding('UTF-8');

//CSV読み込み
$filep = file('provinces.csv');
$filec = file('countries.csv');

//二次元配列に変換
for($i=0; empty($filep[$i])===false;$i++){
    $filep[$i]=explode(",",$filep[$i]);
}
for($i=0; empty($filec[$i])===false;$i++){
    $filec[$i]=explode(",",$filec[$i]);
}

//マスから資金を回収
for($i=0; empty($filep[$i])===false;$i++){
    if(strcmp($filep[$i][1], $filep[$i][2]) == 0){ //領有国と管理国が同じだったら
        for($j=0; empty($filec[$j])===false;$j++){
            if($filec[$j][0]==$filep[$i][1]){ //領有国を探して
                $filec[$j][2]=$filec[$j][2]+1; //1円を追加
            }
        }
    }
}


//一次元配列に変換
for($i=0; empty($filep[$i])===false;$i++){
    $filep[$i]=implode(",",$filep[$i]);
}
for($i=0; empty($filec[$i])===false;$i++){
    $filec[$i]=implode(",",$filec[$i]);
}

//CSV出力
file_put_contents("provinces.csv",$filep);
file_put_contents("countries.csv",$filec);

?>