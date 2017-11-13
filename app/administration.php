<?php

namespace app;
require_once "reg_class.php";
class moder{
    public static function moderCheck()
    {
        $link = linkSql::link();
        $strSQL = "SELECT * FROM users where login = '" . $_SESSION['login'] . "' ";
        $rs = mysqli_query($link, $strSQL);
        $role = $rs->fetch_assoc();
        if ($role['role'] == 'moder' && $_SESSION['role'] == 'moder') {
            return $role;
        }
    }
}

class admin extends moder
{
    public static function adminButton()
    {
        $link = linkSql::link();
        $strSQL = "SELECT * FROM users where login = '" . $_SESSION['login'] . "' ";
        $rs = mysqli_query($link, $strSQL);
        $role = $rs->fetch_assoc();
        if (($role['role'] == 'admin' && $_SESSION['role'] == 'admin')||($role['role'] == 'moder' && $_SESSION['role'] == 'moder')) { ?>
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

    public static function changeToModer()
    {
        $link = linkSql::link();
        $strSQL = "UPDATE users SET role = 'moder' WHERE login = '" . $_POST['moder'] . "' ";
        mysqli_query($link, $strSQL);
    }
}

?>