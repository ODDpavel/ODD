<?php
session_start();
require_once 'header.php';
require_once 'footer.php';
require_once 'reg_class.php';
?>

<?php
\app\changePassword::changePassword();

?>
<div class="container">
    <form name="test" action="../index.php" method="post">
        <p style="color: #666"><label> Login :</label> </br>
            <input type="text" class="form-control-static" name="Login" placeholder="login" maxlength="15" required> </br>
        </p>
        <p style="color: #666"><label> Password :</label> </br>
            <input type="text" class="form-control-static" name="Password" placeholder="password" maxlength="20" required> </br>
        </p>
        <p style="color: #666"><label> Confirm password :</label> </br>
            <input type="text" class="form-control-static" name="Confirm" placeholder="password" maxlength="20" required> </br>
        </p>
        <p style="color: #666"><label> New password :</label> </br>
            <input type="text" class="form-control-static" name="NewPassword" placeholder="password" maxlength="20" required> </br>
        </p>
        <input type="submit" class="btn btn-success" name="ChangePassword" value="Change">
    </form>
</div>
