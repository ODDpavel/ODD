<?php
require_once '../app/header.php';
require_once '../app/footer.php';
require_once  '../app/reg_class.php';
?>
<?php


?>
    <div class="container">

        <form action="../index.php">
            <button class="btn btn-primary">Base page</button>
        </form>
    </div>
    <br>
    <div class="container">
    <table cellspacing="2" border="1" cellpadding="5" width="200">
<?php
    $link = app\linkSql::linked();
    $strSQL = "SELECT * FROM users ";// формируем запрос
    $rs = mysqli_query($link, $strSQL); // производим запрос в бд

    echo "<th > Logins </th> <th > email </th> <th> password</th>";

    while ($row = mysqli_fetch_array($rs)){
        echo "<tr> <td bgcolor='aqua'>" . $row[1]. "</td>   <td bgcolor='aqua'>" . $row[3]. "</td> <td bgcolor='aqua'>" . $row[2]. "</td> </tr>" ;
        echo "<br>";
    }
 ?>
    </table>
    </div>
