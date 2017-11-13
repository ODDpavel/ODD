<?php
require_once 'controller/error_handler.php';

class A {
    function foo(){
        echo "Hello";
    }
}

class B extends A {
    function bar(){
        echo " world!";
    }
}
$b = new B();
$b->foo();
$b->bar();

echo $_SERVER['SERVER_SOFTWARE'];
echo PHP_VERSION;
echo PHP_OS;
setcookie("name", "PAVEL", time()+3600);
echo $_COOKIE['name'];
echo "\n";
$password = '1234';
$hash = password_hash($password, PASSWORD_BCRYPT);
print_r($hash);