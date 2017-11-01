<?php
session_start();
require_once '../reg_class.php';
$link = app\linkSql::link();
$id = $_POST["id"];
mysqli_query($link, "DELETE FROM `comments`  WHERE `id` = '$id'");
header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем редирект обратно
?>