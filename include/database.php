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
        mysqli_connect("localhost", "root", "", 'MyBase');




        if (isset($_POST ["LogButton"])) {
            $postLog = $_POST['Login'];
            $strSQL = "SELECT * FROM users where login = '"."$postLog"."' ";// формируем запрос

            $rs = mysqli_query($link, $strSQL); // производим запрос в бд

            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC); // результат записываем в массив

                $strLogin = $row['login'];
                $strPassword = $row['password'];

                if ($strLogin == $_POST['Login'] && $strPassword == $_POST['Password'] )  {

                    echo '<div class="log">'. $strLogin . " Добро пожаловать!".'</div>'.'<br />';
                } else {
                    echo '<div class="err">' . "Неверный логин или пароль!" . '</div>'.'<br />';
                }

        };


?>


</body>
</html>