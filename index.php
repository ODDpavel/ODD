<?php
    require_once 'include/database.php'
?>
<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title> MyDev </title>
</head>
<body>
    <form name="test" action="include/database.php" method="post">
        <p style="color: cornsilk"><label> Login :</label> </br>
        <input type="text" name="Login" placeholder="логин"> </br>
        </p>
        <p style="color: cornsilk">
            <label> Password :</label> </br>
        <input type="text" name="Password" placeholder="пароль"> </br>
        </p>
        <input type="submit" name="LogButton" value="Готово">
    </form>

    <h1> MyFirstDev</h1>
    <h2> Hello User</h2>

</body>
</html>