<?php
require_once 'app/header.php';
require_once 'app/footer.php';

?>
<?php
$link = mysqli_connect('localhost', 'root', '', 'MyBase');
if (mysqli_connect_errno()) {
    echo 'Ошибка в подключении к базе данных ('. mysqli_connect_errno() .' ) : '. mysqli_connect_error();
    exit();
}
?>

<?php
    $username = trim($_POST['username']); // trim убирает пробелы
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

   if (isset($_POST['Reg'])) {
       $errors = array();
       if($username == '') {
           $errors[] = 'Введите логин';
       }
       if($email == '') {
           $errors[] = 'Введите email';
       }
       if($password == '') {
           $errors[] = 'Введите пароль';
       }
       if($password != $confirm) {
           $errors[] = 'Подтвердите верный пароль';
       }
       if (empty($errors)) {
           // Всё хорошо продолжаем регистрацию

            $insert_sql = "INSERT INTO users (login, password, email) VALUES ('$username','$password','$email')";
            mysqli_query($link, $insert_sql);
            echo "<div class='alert alert-info' role='alert'>".'Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.'. "<a href='index.php'> Главная страница</a></div>";

       } else {
            echo '<div class="alert alert-danger" role="alert">'.array_shift($errors).'</div>';

       }
   }
?>