<?php
session_start();
require_once 'header.php';
require_once 'footer.php';
require_once '../reg_class.php';
require_once '../administration.php';

app\linkSql::link();

?>
<div class="container container-top">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Boardgames</h1>
            <div class="list-group">
                <a href="#" class="list-group-item active">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img class="card-img-top" src="../../img/monopoly-1.jpg" alt="">
                <div class="card-body">
                    <h2 class="card-title">Monopoly</h2>
                    <h3>$29.99</h3>
                    <p class="card-text">
                    <h4>Product Description:</h4><br>
                    Monopoly is the world's favorite family brand. The classic, fast-dealing property trading game
                    welcomes the Cat into its family of tokens. After an online vote, fans around the globe decided the
                    Cat would be the purr-fect addition to the Monopoly game. Put your token on the Go space and roll
                    the dice to own it all in the fast-paced world of real estate. Make a move, make a deal and make a
                    fortune to win it all. There can be only one winner in the Monopoly game; will it be you?.
                    <h4>From the Manufacturer:</h4><br>
                    Own it all as a high-flying trader in the fast-paced world of real estate. Tour the city for the
                    hottest properties: sites, stations and utilities are all up for grabs. Invest in houses and hotels,
                    then watch the rent come pouring in. Make deals with other players and look out for bargains at
                    auction—there are many ways to get what you want. And for really speedy dealers, use the speed die
                    for a quick and intense game of Monopoly. So get on Go and trade your way to success.</p>
                </div>
            </div>
            <div class="container container-bottom">
                <div class="row">
                    <h2>Comment</h2>
                </div>

            </div>
            <?php


            $page = 'monopoly';
            $link = app\linkSql::link();
            $result_set = mysqli_query($link, "SELECT * FROM `comments` WHERE `page`='monopoly'");
            while ($row = $result_set->fetch_assoc()) {
                ?>
                <div class="qa-message-list " id="wallmessages">
                    <div class="message-item" id="m16">
                        <div class="message-inner">
                            <div class="message-head clearfix">
                                <div class="avatar pull-left"><img class="img-avatar"
                                                                   src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                </div>
                                <div class="user-detail">
                                    <h5 class="handle"><?php print $row['name']; ?></h5>
                                    <?php if(\app\moder::moderCheck()) { ?>
                                    <form action="delete_comment.php" method="POST">
                                        <input type="text" hidden value="<?php echo $row['id']?>" name="id"/>
                                        <input type="submit"  name="delete" value="delete"/>
                                    </form> <?php }
                                    ?>
                                    <div class="post-meta">
                                        <div class="asker-meta">
                                            <span class="qa-message-what"></span>
                                            <span class="qa-message-when">
												<span class="qa-message-when-data"><?php print $row['time_comment']; ?></span>
											</span>
                                            <span class="qa-message-who">
												<span class="qa-message-who-pad">by </span>
												<span class="qa-message-who-data"><a
                                                            href=""><?php print $row['name']; ?></a></span>
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="qa-message-content">
                                <?php
                                print $row['text_comment'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php


            } ?>


            <?php

            ?>
            <?php if ($_SESSION["login"] !== "Guest") { ?>
                <div class="container container-top">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form accept-charset="UTF-8" action="../comment.php" method="POST">
                                        <textarea class="form-control counted" name="text_comment"
                                                  placeholder="Type in your message" rows="5"
                                                  style="margin-bottom:10px;"></textarea>
                                        <input type="hidden" name="page" value="monopoly"/>
                                        <input type="submit" class="btn btn-info" name="SubmitButton" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>

</div>



