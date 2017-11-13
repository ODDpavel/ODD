<?php
session_start();
require_once '../app/header.php';
require_once '../app/footer.php';
require_once '../app/reg_class.php';
require_once '../app/administration.php';
?>
<?php


?>

<div class="container">

    <form action="../index.php">
        <button class="btn btn-primary">Base page</button>
    </form>
</div>
<br>
<?php if ((\app\admin::adminCheck())||(\app\moder::moderCheck())) { ?>
<div class="container">
    <div class="row">
        <table cellspacing="2" border="1" cellpadding="5" width="200">
            <?php
            $link = app\linkSql::link();
            $strSQL = "SELECT * FROM users ";// формируем запрос
            $rs = mysqli_query($link, $strSQL); // производим запрос в бд

            echo "<th > Logins </th> <th > email </th> <th> password</th>";

            while ($row = mysqli_fetch_array($rs)) {
                echo "<tr> <td bgcolor='aqua'>" . $row[1] . "</td>   <td bgcolor='aqua'>" . $row[3] . "</td> <td bgcolor='aqua'>" . $row[2] . "</td> </tr>";
                echo "<br>";
            }
            ?>
        </table>
        <br/>
        <?php if (\app\admin::adminCheck()) { ?>
            <form class="form-inline" action="delete_user.php" method="post">
                <div class="form-group">
                    <label for="exampleInputName2">Delete user</label>
                    <input type="text" class="form-control"  placeholder="User login" name="login">
                </div>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <?php
        }
        ?>
        <br/>
        <?php if (\app\admin::adminCheck()) { ?>
            <form class="form-inline" action="change_to_moder.php" method="post">
                <div class="form-group">
                    <label for="exampleInputName2">Change to moder</label>
                    <input type="text" class="form-control"  placeholder="User login" name="moder">
                </div>
                <button type="submit" class="btn btn-info">Change</button>
            </form>
            <?php
        }
        ?>
        <table cellspacing="2" border="1" cellpadding="5" width="200">
            <?php

            $strSQL = "SELECT functions.description FROM functions 
                  JOIN functions_roles 
                  ON functions.function_id = functions_roles.function_id 
                  JOIN role
                  ON functions_roles.roles_id = role.roles_id
                  JOIN users
                  ON users.role_id = role.roles_id
                  WHERE users.login = '" . $_SESSION['login'] . "' ";
            $rs = mysqli_query($link, $strSQL);
            echo "<th > Description </th> ";

            while ($row = mysqli_fetch_array($rs)) {
                echo "<tr> <td bgcolor='aqua'>" . $row[0] . "</td> ";
                echo "<br>";
            }
            ?>
        </table>
    </div>
</div>
<?php } else {
    print_r("<h1>"."Leave page"."</h1>") ;
} ?>