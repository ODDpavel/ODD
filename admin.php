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
    <div class="container">

        <form action="index.php">
            <button class="btn btn-primary">Base page</button>
        </form>
    </div>
    <br>
    <div class="container">
    <table cellspacing="2" border="1" cellpadding="5" width="200">
<?php
    mysqli_connect("localhost", "root", "", 'MyBase');
    $strSQL = "SELECT * FROM users ";// формируем запрос
    $rs = mysqli_query($link, $strSQL); // производим запрос в бд

    echo "<th > Logins </th>";

    while ($row = mysqli_fetch_array($rs)){
        echo "<tr> <td bgcolor='aqua'>" . $row[1]. "</td> </tr>" ;
        echo "<br>";
    }
 ?>
    </table>
    </div>
