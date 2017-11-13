<?php
session_start();
require_once "reg_class.php";
$link = app\linkSql::link();
//header("Refresh: 1");
echo "Тестовая страница <br>";
echo date("H:i:s")."\n <br>";
function divide($a, $b) {
    if ($b == 0) throw new Exception("На ноль делить нельзя");

    return $a/$b;
}

try {
    $i = 10;
    $i = divide(10,2);
    $i++;

}
catch (Exception $e) {
    echo $e->getMessage();
}

    echo  $i;

$file = 'edit.php';
try{
    if (!file_exists($file)) { // проверяем на существование файла в проекте
        throw new Exception("File not found!!!");
    } else {
        echo $file;
    }
} catch (Exception $e){
    echo $e->getMessage();
}

const HELP = 'help.php';
echo HELP;
?>

<?php
setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = strftime('%B');
$mon = iconv('windows-1251', 'utf-8', $mon);
$year = strftime('%Y');

echo 'Сегодня ', $mon;

function sayHello($name)
{
    echo "<h1>Hello, $name!</h1>";
    global $name;
    $name = "Вася";
    echo "<h1>Hello, $name!</h1>";
}
sayHello("John");
$name = "Mike";
sayHello($name);
echo $name;
$GLOBALS['name'] = 'Pavel';

print_r(getdate(1935521234));
$userName = 'odd';
$_COOKIE['name'];

$strSQL = "SELECT functions.description FROM functions 
                  JOIN functions_roles 
                  ON functions.function_id = functions_roles.function_id 
                  JOIN role
                  ON functions_roles.roles_id = role.roles_id
                  JOIN users
                  ON users.role_id = role.roles_id
                  WHERE users.login = '" . $userName . "' ";
$rs = mysqli_query($link, $strSQL); // производим запрос в бд

 // результат записываем в массив
while ($row = mysqli_fetch_array($rs)) {
    echo $row[0]."\n";
}
