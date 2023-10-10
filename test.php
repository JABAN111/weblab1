<!DOCTYPE html>
<html lang="ru" class = "no-js">
<head>

    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <title>Lab №1</title>

    <meta name = "description" content= "Web-programming first lab">
    <meta name="author" content="Niagin Mikhail Alexeyevich">

    <link rel = "icon" type="pictures/icon" href = "picterus/icon.png">
</head>
<body>
    <form action = "test.php" method="post">
        
    </form>
</body>
</html>


<?php
$time_start = microtime(true);

// Спим некоторое время
usleep(100);

$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Ничего не делал $time секунд\n";
echo "\nВремя начала: " . $time_start . "\n" . "Время end: " . $time_end

?>