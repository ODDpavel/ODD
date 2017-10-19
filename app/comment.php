<?php
session_start();
require_once 'reg_class.php';

$link = app\linkSql::link();
$name = $_SESSION["login"];
$page = $_POST["page"];
$text_comment = $_POST["text_comment"];
$name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
$text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
$time_comment = date("Y-m-d H:i:s");
mysqli_query($link, "INSERT INTO `comments` (`name`, `time_comment`, `page`, `text_comment`) VALUES ('$name','$time_comment', '$page', '$text_comment')");
header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
?>