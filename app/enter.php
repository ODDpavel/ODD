<?php
session_start();
require_once 'header.php';
require_once 'footer.php';
require_once 'reg_class.php';
?>
<?php
app\linkSql::linked();
app\enter::entered();

