<?php
    session_start();
    $_SESSION['login'] = 'Гость';
    require_once 'app/enter.php';
    require_once 'app/header.php';
    require_once 'app/footer.php';
?>
    <div class="container">
    <form name="test" action="app/enter.php" method="post">
        <p style="color: #666"><label> Login :</label> </br>
        <input type="text" class="form-control-static" name="Login" placeholder="login"> </br>
        </p>
        <p style="color: #666">
            <label> Password :</label> </br>
        <input type="text" class="form-control-static" name="Password" placeholder="password"> </br>
        </p>
        <input type="submit" class="btn btn-primary" name="LogButton" value="Submit">
    </form>
    <br>
    <form action="app/regpage.php">
    <button class="btn btn-primary">Registration</button>
    </form>


    </div>
    <div class="container">
        <br>
<form action="app/admin.php">
    <button class="btn btn-warning">Administration</button>
</form>
    </div>
