<?php
require_once 'app/reg_class.php';
$link = \app\linkSql::link();
$strSQL = "SELECT * FROM users where status = 0 ";
$rs = mysqli_query($link, $strSQL); // производим запрос в бд


$date = new DateTime(date('Y-m-d H:i:s'));
$date->modify('-1 minute');
$fixTime = $date->format('Y-m-d H:i:s');

while ($row = mysqli_fetch_array($rs)) {
    $regTime = $row['regTime'];
    if ($regTime < $fixTime) {
        mysqli_query($link, "DELETE FROM `users`  WHERE `status` = 0");
    }
}

$r = date('Y-m-d H:i:s') . ': ' . rand(0, 99) . "\n";

$path = __DIR__ . '/forcron.txt';
file_put_contents($path, $r, FILE_APPEND);