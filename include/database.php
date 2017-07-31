<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title> MyDev </title>
</head>
<body>
<?php
    $link = mysqli_connect('localhost', 'root', '', 'MyBase');
    if (mysqli_connect_errno()) {
        echo 'Ошибка в подключении к базе данных ('. mysqli_connect_errno() .' ) : '. mysqli_connect_error();
        exit();
    }
?>

<?php
        $login = 'Неизвестен';
        $password = 'Неизвестен';
        if(isset($_POST['Login'])) $login = $_POST['login'];
        if (isset($_POST['Password'])) $password = $_POST['password'];


        $qr = $_POST ['Login'];
        mysqli_connect("localhost", "root", "", 'MyBase');
        $strSQL = "SELECT * FROM users "; // формируем запрос
        $rs = mysqli_query($link, $strSQL); // производим запрос в бд
        $row = mysqli_fetch_array($rs); // результат записываем в массив
        if (isset($_POST ["LogButton"])) {
            while ($row = mysqli_fetch_array($rs)) {
                $strLogin = $row['login'];
                $strPassword = $row['password'];
                if ($strLogin == $_POST['Login'] && $strPassword == $_POST['Password'] ) {

                    echo '<div class="log">'. $strLogin . " Добро пожаловать!".'</div>'.'<br />';
                }
            }
        };



?>

<?php
   /* if ($_GET ['Login'] == $row['login'] ) {
        echo 'Вход произведён успешно';
    } else {
        echo 'неверный пользователь или пароль';
    }
*/
    ?>

</body>
</html>