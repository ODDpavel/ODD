<?php
session_start();
require_once 'reg_class.php';
require_once 'administration.php';
$link = app\linkSql::link();
$login = $_POST["login"];
if (\app\admin::adminCheck()) {
    mysqli_query($link, "DELETE FROM `users`  WHERE `login` = '$login'");
    // Делаем редирект обратно
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>