<?php
session_start();
require_once 'reg_class.php';
require_once 'header.php';
require_once 'footer.php';
require_once 'administration.php';
$link = \app\linkSql::link();
\app\changePassword::changePassword();
?>
<?php
$login = $_SESSION['login'];
$strSQL = "SELECT * FROM users where login = '" . "$login" . "' ";
$rs = mysqli_query($link, $strSQL); // производим запрос в бд

$row = mysqli_fetch_array($rs, MYSQLI_ASSOC); // результат записываем в массив

$email = $row['email'];

$_SESSION['id'] = $row['id_user'];
$_SESSION['avatar'] = $row['avatar']
?>
<script>
    $(document).ready(function () {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');
        allWellsExceptFirst.hide();
        navItems.click(function (e) {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');
            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
    });
</script>
<div class="container container-top">

    <div class="row">

        <div class="col-md-3">
            <img src="images/avatars/<?php
            if ($_SESSION['id'] == $_SESSION['avatar']) {
                echo $_SESSION['id'];
            } else {
                echo $_SESSION['avatar'];
            } ?>.jpeg" class="img-circle container-bot" width="262"
                 height="262">

            <ul class="nav nav-pills nav-stacked admin-menu">
                <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> Profile</a>
                </li>
                <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
                </li>
                <li><a href="" data-target-id="settings"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                <li><a href="" data-target-id="logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
            </ul>
        </div>

        <div class="col-md-9  admin-content" id="profile">

            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <?php echo $_SESSION['login']; echo $_COOKIE['login']; ?>
                </div>
            </div>
            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                    <h3 class="panel-title">Email</h3>
                </div>
                <div class="panel-body">
                    <?php
                    echo $email;
                    ?>
                </div>
            </div>

            <form action="controller/upload.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><label for="Avatar" class="control-label panel-title">Avatar</label>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="file" name="avatar"/>
                                <input type="submit" value="Send File"/>
                                <?php echo $_SESSION['msg'] ?>
                            </div>

                        </div>

                    </div>
                </div>
            </form>


        </div>
        <div class="col-md-9  admin-content" id="settings">
            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                    <h3 class="panel-title">Notification</h3>
                </div>
                <div class="panel-body">
                    <div class="label label-success">allowed</div>
                </div>
            </div>
            <!--      <div class="panel panel-info" style="margin: 1em;">
                      <div class="panel-heading">
                          <h3 class="panel-title">Newsletter</h3>
                      </div>
                      <div class="panel-body">
                          <div class="badge">Monthly</div>
                      </div>
                  </div>
                  -->
            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin</h3>

                </div>
                <div class="panel-body">
                    <div class="label label-success">yes</div>
                </div>
            </div>

        </div>

        <div class="col-md-9  admin-content" id="change-password">
            <form action="edit.php" method="post">

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><label for="Login" class="control-label panel-title">Login</label></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Login"
                                       value="<?php echo $_SESSION['login'] ?>"
                                       maxlength="15" required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><label for="Password" class="control-label panel-title">Password</label>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Password" placeholder="password"
                                       maxlength="20"
                                       required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><label for="Confirm" class="control-label panel-title">Confirm
                                password</label></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Confirm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><label for="NewPassword" class="control-label panel-title">New
                                Password</label></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="NewPassword">
                            </div>
                        </div>

                    </div>
                </div>


                <div class="panel panel-info border" style="margin: 1em;">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="pull-left">
                                <input type="submit" class="form-control btn btn-primary" name="ChangePassword"
                                       id="submit" value="ChangePassword">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-9  admin-content" id="settings"></div>

        <div class="col-md-9  admin-content" id="logout">
            <div class="panel panel-info" style="margin: 1em;">
                <div class="panel-heading">
                    <h3 class="panel-title">Confirm Logout</h3>
                </div>
                <div class="panel-body">
                    Do you really want to logout ?  
                    <a href="../app/logout.php" class="label label-danger">
                        <!-- onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> -->
                        <span>   Yes   </span>
                    </a>    
                    <a href="../app/edit.php" class="label label-success"> <span>  No   </span></a>
                </div>
                <form id="logout-form" action="#" method="POST" style="display: none;">
                </form>


            </div>
        </div>
    </div>
</div>

<?php
\app\admin::adminButton();


?>


