<?php

session_start();


require_once 'app/header.php';
require_once 'app/footer.php';
if($_SESSION['login'] == 'Guest'){
    $_SESSION['role'] = 'guest';
}
?>


<div class="container container-top">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Boardgames</h1>
            <div class="list-group">
                <a href="app/item-shop/monopoly.php" class="list-group-item">Category 1</a>
                <a href="#" class="list-group-item">Category 2</a>
                <a href="#" class="list-group-item">Category 3</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carousel" class="carousel slide my-4 form-group form-group-top" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img class="d-block img-fluid" src="img/carcasson.jpg" alt="First slide">
                        <div>
                            <h3 class="carousel-caption"> Carcasson </h3>
                        </div>
                    </div>
                    <div class="item">
                        <img class="d-block img-fluid" src="img/catan.png" alt="Second slide">
                        <div class="carousel-caption">
                            <h3> Catan </h3>
                        </div>
                    </div>
                    <div class="item">
                        <img class="d-block img-fluid" src="img/ticketToRide.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h3> Ticket To Ride </h3>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>

                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>

                </a>

            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail hr">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div>
                            <h4>
                                <a href="#">Item One</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Item Two</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! </p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Item Three</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail hr">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div>
                            <h4>
                                <a href="#">Item Four</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail hr">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div>
                            <h4>
                                <a href="#">Item Five</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 form-group">
                    <div class="thumbnail hr">
                        <a href="#"><img class="img-responsive" src="http://placehold.it/700x400"
                                         alt="Responsive image"></a>
                        <div>
                            <h4>
                                <a href="#">Item Six</a>
                            </h4>
                            <h5>$24.99</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
\app\linkSql::link();
\app\changePassword::changePassword();




