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

use php\areaData as areaDatas;
    for($i = 0; $i < 10; $i++){
        echo $i . "<br>";
    }
    // require_once('');

    $c = new areaData("checkName");
    print(areaData::areaCheck(1,-1,0));

?>