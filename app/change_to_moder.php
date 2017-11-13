<?php
session_start();
require_once 'reg_class.php';
require_once 'administration.php';
\app\admin::changeToModer();
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>