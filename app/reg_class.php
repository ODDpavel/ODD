<?php

namespace app;

class reg_class
{
    public static function registered()
    {
        $link = mysqli_connect('localhost', 'root', '', 'MyBase');

        $username = trim($_POST['username']);// trim убирает пробелы

        $email = trim($_POST['email']);

        $password = trim($_POST['password']);

        $password = md5($password);

        $confirm = trim($_POST['confirm']);

        $confirm = md5($confirm);
        $base_url = 'http://myfirstdev/app/';


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
                $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

                if (preg_match($regex, $email)) // Выполняет проверку на соответствие регулярному выражению
                {

                    $activation = md5($email . time()); // email + timestamp - значение точки текущего времени
                    $count = mysqli_query($link, "SELECT id_user FROM users WHERE email='$email'");
// проверка email-а
                    if (mysqli_num_rows($count) < 1) {
                        mysqli_query($link, "INSERT INTO users(login,password,email, activation) VALUES('$username','$password','$email','$activation')");
// отправка письма

                        $to = "Romanoff78@yandex.ru";
                        $subject = "Проверка Email-а";
                        $body = 'Hi, ' . $username . '.  Активация! Пожалуйста перейдите по ссылки для активации вашего аккаунта' . '<a href="http://myfirstdev/app/activation.php">' . $base_url . 'activation.php/?code=' . $activation . '</a>';
                        try {
                            mail($to, $subject, $body);
                            if (!mail($to, $subject, $body)){
                                throw new Exception("Message not sent!!!");
                            };
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        $msg = "Регистрация прошла успешно! Пройдите активацию через email.";
                    } else {
                        $msg = 'Данный email уже занят.';
                    }

                } else {
                    $msg = 'Не валидный email.';
                }
                echo "<div class='alert alert-info' role='alert'> <br/><br/>" . $msg . "</div>";

            }
        }
    }

    public static function activation()
    {
        $link = linkSql::link();
        if (!empty($_GET['code']) && isset($_GET['code'])) {
            $code = mysqli_real_escape_string($link, $_GET['code']); // Экранирует специальные символы в строке для использования в SQL

            $c = mysqli_query($link, "SELECT id_user FROM users WHERE activation='$code'");

            if (mysqli_num_rows($c) > 0) {
                $count = mysqli_query($link, "SELECT id_user FROM users WHERE activation='$code' and status='0'");

                if (mysqli_num_rows($count) == 1) {
                    mysqli_query($link, "UPDATE users SET status='1' WHERE activation='$code'");
                    $msg = "Ваш аккаунт активирован";
                } else {
                    $msg = "Ваш аккаунт уже активирован";
                }

            } else {
                $msg = "Неверный код активации";
            }
            echo "<div class='alert alert-info' role='alert'>" . $msg . "</div>";
        }
    }
}


class enter
{
    public static function enter()
    {
        $link = linkSql::link();
        if (isset($_POST ["LogButton"])) {
            $postLog = $_POST['Login'];
            $strSQL = "SELECT * FROM users where login = '" . "$postLog" . "' ";// формируем запрос

            $rs = mysqli_query($link, $strSQL); // производим запрос в бд

            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC); // результат записываем в массив

            $strLogin = $row['login'];
            $strPassword = $row['password'];
            $status = $row['status'];
            $role = $row['role'];
            if ($strLogin == $_POST['Login'] && $strPassword == md5($_POST['Password']) && !empty($_POST['Login']) && !empty($_POST['Password']) && $status == 1) {
                $_SESSION['login'] = $strLogin;
                $_SESSION['role'] = $role;
                header('Location: /app/edit.php');
                ?>
                <?php

            } else {

                echo '<p class="alert alert-danger" role="alert">' . "Неверный логин или пароль!" . '</p>' . '<br />';

            }

        }
    }

    public static function session()
    {
        if (!isset($_SESSION["login"])) {
            $_SESSION["login"] = "Guest";
        } else {
            $_SESSION["login"];
        }
        return $_SESSION["login"];
    }

}

class linkSql
{
    public static function link()
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

class changePassword
{
    public static function changePassword()
    {
        $link = linkSql::link();
        if (isset($_POST ["ChangePassword"])) {
            $postLog = $_POST['Login'];
            $postPass = md5($_POST['Password']);
            $newPass = md5($_POST['NewPassword']);
            $strSQL = "SELECT * FROM users where login = '" . "$postLog" . "' ";
            $rs = mysqli_query($link, $strSQL);
            $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);
            $strLogin = $row['login'];
            $strPassword = $row['password']; // сравниваем md5 результаты $postPass и $strPassword
            if ($_POST['Password'] == $_POST['Confirm'] && $strLogin == $_POST['Login'] && $strPassword == md5($_POST['Password']) && !empty($_POST['Login']) && !empty($_POST['Password']) && $postPass == $strPassword) {
                echo '<p class="alert alert-info" role="alert">' . "Password successfully changed!" . '</p>' . '<br />';
                $updatePass = "UPDATE users SET password = '" . "$newPass" . "' WHERE login = '" . "$postLog" . "'";
                mysqli_query($link, $updatePass);

            } else {

                echo '<p class="alert alert-danger" role="alert">' . "Неверный логин или пароль!" . '</p>' . '<br />';

            }
        }

    }

}