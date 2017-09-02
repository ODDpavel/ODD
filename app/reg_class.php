<?php
namespace app;
class reg_class
{
    public static function registered()
    {
            $link= mysqli_connect('localhost', 'root', '', 'MyBase');

            $username = trim($_POST['username']);// trim убирает пробелы

            $email = trim($_POST['email']);

            $password = trim($_POST['password']);

            $password = md5($password);

            $confirm = trim($_POST['confirm']);

            $confirm = md5($confirm);

            if (isset($_POST['Reg'])) {
                $errors = array();
                if ($username == '') {
                    $errors[] = 'Введите логин';
                }
                if ($email == '') {
                    $errors[] = 'Введите email';
                }
                if ($password == '') {
                    $errors[] = 'Введите пароль';
                }
                if ($password != $confirm) {
                    $errors[] = 'Подтвердите верный пароль';
                }
                if (empty($errors)) {
                    $insert_sql = "INSERT INTO users (login, password, email) VALUES ('$username','$password','$email')";

                    mysqli_query($link, $insert_sql);
                    echo "<div class='alert alert-info' role='alert'>" . 'Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.' . "<a href='../index.php'> Главная страница</a></div>";

                } else {
                    echo '<div class="alert alert-danger" role="alert">' . array_shift($errors) . '</div>';
                }
            }
    }
}



class enter {
    public static function entered(){
        $link = linkSql::linked();
        if (isset($_POST ["LogButton"]) ) {
            $postLog = $_POST['Login'];
            $strSQL = "SELECT * FROM users where login = '"."$postLog"."' ";// формируем запрос

            $rs = mysqli_query($link, $strSQL); // производим запрос в бд

            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC); // результат записываем в массив

            $strLogin = $row['login'];
            $strPassword = $row['password'];

            if ($strLogin == $_POST['Login'] && $strPassword == md5($_POST['Password']) && !empty($_POST['Login']) && !empty($_POST['Password']) )  {

                echo '<p class="alert alert-info" role="alert">'. $strLogin . " Добро пожаловать!".'</p>'.'<br />';
                $_SESSION['login'] = $strLogin;

            } else {

                echo '<p class="alert alert-danger" role="alert">' . "Неверный логин или пароль!" . '</p>'.'<br />';

            }

        }
    }
}

class linkSql
{
    public static function linked()
    {
        $link = mysqli_connect('localhost', 'root', '', 'MyBase');
        if (mysqli_connect_errno()) {
            echo 'Ошибка в подключении к базе данных (' . mysqli_connect_errno() . ' ) : ' . mysqli_connect_error();
            exit();
        } else {
            return $link;
        }
    }
}