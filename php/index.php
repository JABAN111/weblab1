<?php
include "areaData.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Начало записи времени
    $timeStart = microtime(true);

    //полученные данные методом post
    $x = (int) $_POST["x"];
    $y = (float) $_POST["y"];
    $R = (int) $_POST["R"];

    //Определяем UTC время отправителя
    //временно не работает:D
    $localTime = $_POST["localTime"];
    $userTimeZone = "Europe/Moscow";
    date_default_timezone_set($userTimeZone);
    $time = date("Y-m-d") . "\n" . date("H:i:s");

    $areaData = new areaData();
    $result = $areaData -> areaCheck($x,$y,$R);

    $timeEnd = microtime(true);
    $timeOfWorkingScript = $timeEnd - $timeStart;
    $timeOfWorkingScriptMilliseconds = $timeOfWorkingScript * 1000;


    $table = "<tr><td>$x</td>
                <td>$y</td>
                <td>$R</td>
                <td id = jo>$result</td>";
    $table .= "<td>$time</td>";
    $table .= "<td>$timeOfWorkingScriptMilliseconds</td></tr>";

    echo $table;
    // Генерация HTML-таблицы на основе полученных данных
//    $table = "<table>";
//    $table .= "<tr><td>x</td></tr>";
//    $table .= "<tr><td>y</td></tr>";
//    $table .= "<tr><td>R</td></tr>";
//
//    $table .= "<tr><td>$x</td></tr>";
//    $table .= "<tr><td>$x</td></tr>";
//    $table .= "<tr><td>$x</td></tr>";
//
//    $table .= "</table>";
} else {
    http_response_code(405);
    echo "Метод не поддерживается";
    exit;
}
?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Результат</title>-->
<!--</head>-->
<!--<body>-->
<!--<h2>Результат:</h2>-->

<!--</body>-->
<!--</html>-->
