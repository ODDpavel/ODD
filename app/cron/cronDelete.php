<?php
$link = mysqli_connect('localhost', 'root', '', 'MyBase');
$strSQL = "SELECT * FROM users where status = 0 ";
$rs = mysqli_query($link, $strSQL); // производим запрос в бд


$date = new DateTime(date('Y-m-d H:i:s'));
$date->modify('-5 minute');
$fixTime = $date->format('Y-m-d H:i:s');

while ($row = mysqli_fetch_array($rs)) {
    $regTime = $row['regTime'];
    if ($regTime < $fixTime) {
        $log = $row['login'];
        mysqli_query($link, "DELETE FROM `users`  WHERE `status` = 0");
        $path = __DIR__ . '/cron.txt' . "\n";
        file_put_contents($path, $log, FILE_APPEND);
    }
}

