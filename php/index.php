<?php
include "areaData.php";
include "validator.php";
@session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit;
}
if (!isset($_SESSION["results"])) {
    $_SESSION["results"] = array();
}

// Начало записи времени
$timeStart = microtime(true);

// Полученные данные методом POST
$x = $_POST["x"];
$y = $_POST["y"];
$R = $_POST["R"];
$validator = new Validator($x,$y,$R);
if($validator->checkData()) {

    $timeZone = $_POST["localTime"];
    $userTimeZone = $timeZone;
    date_default_timezone_set($userTimeZone);
    $time = date("Y-m-d") . "\n" . date("H:i:s");

    $areaData = new areaData();
    $result = $areaData->areaCheck($x, $y, $R);

    $timeEnd = microtime(true);
    $timeOfWorkingScript = ($timeEnd - $timeStart) * 1000;

    $newData = array(
        "x" => $x,
        "y" => $y,
        "R" => $R,
        "result" => $result,
        "time" => $time,
        "timeOfWorkingScript" => $timeOfWorkingScript
    );
    $_SESSION["results"][] = $newData;

//array_reverse($session)

    echo "<tr>
        <th>x</th>
        <th>y</th>
        <th>R</th>
        <th>Статус</th>
        <th>Текущее время</th>
        <th>Время работы скрипта(в мс)</th>
    </tr>";

    foreach (($_SESSION["results"]) as $row) {
        echo "<tr>";
        echo "<td>" . $row['x'] . "</td>";
        echo "<td>" . $row['y'] . "</td>";
        echo "<td>" . $row['R'] . "</td>";
        echo "<td>" . $row['result'] . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['timeOfWorkingScript'] . "</td>";
    }

    exit; // Завершение выполнения скрипта
}else{
    http_response_code(422);
    exit;
}
?>
