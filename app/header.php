<?php
require_once "reg_class.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ODD & Co</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../public/js/bootstrap.js"></script>

        <div class="navbar navbar-inverse navbar-static-top-top navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only">Open navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/index.php"> ODD & Co </a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                        <li><a href="#">Page 4</a></li>
                    </ul>
                    <a class="navbar-brand" <?php if ( $_SESSION["login"] !== "Guest"){ ?> href='../app/edit.php' <?php }?> >
                        <?php echo 'Welcome ' . app\enter::session()  ?> </a>
                    <?php if ($_SESSION["login"] == "Guest"){ ?><a class="navbar-brand" href='../app/enter.php'>Click here to login</a><?php }?>
                    <?php if ( $_SESSION["login"] !== "Guest"){ ?><a class="navbar-brand" href='../app/logout.php'>Click here to log out</a><?php }?>
                </div>



            </div>

        </div>
