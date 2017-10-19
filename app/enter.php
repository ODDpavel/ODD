<?php
require_once 'reg_class.php';
session_start();
app\linkSql::link();
app\enter::enter();
require_once 'header.php';
require_once 'footer.php';

?>
<?php

?>

<div class="container container-top">
    <form name="test" action="../app/enter.php" method="post">
        <p style="color: #666"><label> Login :</label> </br>
            <input type="text" class="form-control-static" name="Login" placeholder="login" pattern="[A-Za-z-0-9]{3,15}"
                   title="Не менее 3 и не более 15 значений цифр и букв английского языка" maxlength="15"
                   required> </br>
        </p>
        <p style="color: #666">
            <label> Password :</label> </br>
            <input type="text" class="form-control-static" name="Password" placeholder="password"
                   pattern="[A-Za-z-0-9]{3,20}" title="Не менее 3 и не более 20 значений цифр и букв английского языка"
                   maxlength="20" required> </br>
        </p>
        <input type="submit" class="btn btn-primary" name="LogButton" value="Submit">
    </form>
    <br>
    <form action="../app/regpage.php">
        <button class="btn btn-primary">Registration</button>
    </form>


</div>

