<?php

require __DIR__ . "/areaData.php";
// use areaData;
//include_once
// $data = $_POST;
//echo include_once(areaData::areaCheck(1,-1,2));
//$R = $_POST["R"];
//$x = $_POST["x"];
//$y = $_POST["y"];
//echo $R . " " . $x .  " " .$y
echo areaData::areaCheck($_POST["x"],$_POST["y"],$_POST["R"])
// echo "data:" . $x . " " . $y . " " . $R;
// require_once('areaData');
//echo areaData::areaCheck(1,-1,2);
//if(areaData::areaCheck($x,$y,$R)){
//    echo "true data";
//}else{
//    echo "false data";
//}
// echo "before creating";
// // $areaWork = new areaData();
// print( "data created");
// if($areaWork->areaCheck(-4,42,1)){
    // echo "true data";
// }else{
    // echo "false data";
// }

// if(true){
//     echo "code underground lol";
// }

// $checker -> areaCheck($data["x"],$data["y"],$data["R"]); 
// echo $data
    // echo "{$_POST["username"]}" . "<br>";
    // echo "{$_POST["password"]}" . "<br>";



    // $checker = new areaData;
    // $checker->areaCheck(2,2,1);
?>