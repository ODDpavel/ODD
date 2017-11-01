<?php

namespace app;
require_once "reg_class.php";

class administration
{
    public static function adminButton()
    {
        $link = linkSql::link();
        $strSQL = "SELECT * FROM users where login = '" . $_SESSION['login'] . "' ";
        $rs = mysqli_query($link, $strSQL);
        $role = $rs->fetch_assoc();
        if ($role['role'] == 'admin' && $_SESSION['role'] == 'admin') { ?>
            <div class="container">
                <br>
                <form action="admin_page.php">
                    <button class="btn btn-warning">Administration</button>
                </form>
            </div>
        <?php }
    }

    public static function adminCheck()
    {
        $link = linkSql::link();
        $strSQL = "SELECT * FROM users where login = '" . $_SESSION['login'] . "' ";
        $rs = mysqli_query($link, $strSQL);
        $role = $rs->fetch_assoc();
        if ($role['role'] == 'admin' && $_SESSION['role'] == 'admin') {
            return $role;
        }
    }

}

?>