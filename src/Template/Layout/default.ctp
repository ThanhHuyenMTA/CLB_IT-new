<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset(); ?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
        <meta name="author" content="http://www.365bootstrap.com">

        <title>IT CLUB</title>
        <?= $this->Html->meta('icon'); ?>
        <!-- Bootstrap Core CSS -->
        <?= $this->Html->css('bootstrap.min.css'); ?>

        <!-- Owl Carousel Assets -->
        <?= $this->Html->css('owl.carousel.css'); ?>
        <?= $this->Html->css('owl.theme.css'); ?>
        <!-- Custom CSS -->
        <?= $this->Html->css('style.css'); ?>
        <?= $this->Html->css('bootstrap-datetimepicker.min.css'); ?>
        <!-- Custom Fonts -->
        <?= $this->Html->css('font-awesome.min.css'); ?> 
        <!-- end font -->

        <!-- jQuery and Modernizr-->
        <?= $this->Html->script('jquery-2.1.1'); ?>

        <!-- Core JavaScript Files -->       
        <?= $this->Html->script('bootstrap.min'); ?>
        <?= $this->Html->script('owl.carousel'); ?>

        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>
        <?= $this->fetch('script'); ?>
    </head>

    <body>
        <header>
            <!--Top-->
            <nav id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div style="float: left;"><strong>Welcome to Us!</strong></div>
                            <form method="post" action="/NewCLB/finds/findarticle" name="_method" value="POST">
                                <input type="text" placeholder="Enter Search Keywords" value="" name="v_search" id="v_search" class="form-control" style="width: 300px;margin-left: 200px;float: left;margin-bottom: 4px;">
                                <input type="submit" name="ok" value="search" style="margin-top: 2px;margin-left: 5px;">
                            </form>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-inline top-link link">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <?= $this->Html->link('Home', ['action' => '../']) ?> 
                                </li>
                                <i class="fa fa-comments"></i>
                                <li><?= $this->Html->link('Letter', ['action' => '../letters/gmail']) ?></li>
                                <li><a href="#"><i class="fa fa-question-circle"></i> FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!--Navigation menu-->
            <nav id="menu" class="navbar container">
                <div class="navbar-header">
                    <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                    <a class="navbar-brand" href="#">
                        <div class="logo"><span>Newspaper</span></div>
                    </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li> 
                            <?= $this->Html->link(' Home', ['action' => '../'], array('class' => 'fa fa-home')); ?>
                        </li>

                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Department <i class="fa fa-arrow-circle-o-down"></i></a>
                            <div class="dropdown-menu">
                                <div class="dropdown-inner">
                                    <ul class="list-unstyled">
                                        <!-- load list department -->
                                        <?= $this->Element('../Departments/listdepartment'); ?>   
                                    </ul>
                                </div> 
                            </div>
                        </li>
                        <li>
                            <?= $this->Html->link(' Letter', ['action' => '../letters/inbox'], array('class' => 'fa fa-envelope')) ?></li>
                        <?php if ($loggedIn): ?>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if ($image): ?>
                                        <?= $this->Html->image('new/' . $image, array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>     
                                    <?php else: ?>
                                        <?= $this->Html->image('new/39.png', array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px;border-radius: 50%;')); ?>     
                                    <?php endif; ?>



                                    <i class="fa fa-arrow-circle-o-down"></i></a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li style="margin-left: 20px;">Sign in as</li>
                                            <li  style="color:black;margin-left: 20px;"><?php echo $username ?></li>
                                            <li> <?= $this->Html->link('Logout', ['action' => '../users/logout']) ?>  </li>
                                            <li> <?= $this->Html->link('Profile', ['action' => '../users/profile']) ?> </li>

                                        </ul>
                                    </div>
                                </div>
                            </li>          
                        <?php else : ?>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <i class="fa fa-arrow-circle-o-down"></i></a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li> 
                                                <?= $this->Html->link('Log-in', ['action' => '../users/login'], array('class' => 'overlayLink', 'data-action' => 'login-form.html')) ?>
                                            </li>

                                            <li> 
                                                <?= $this->Html->link('Sign-up', ['action' => '../users/registration'], array('class' => 'overlayLink', 'data-action' => 'login-form.html')) ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>

                        </li>
                        <li><?= $this->Html->link(' Introduce', ['action' => '../Pages/introduce'], array('class' => 'fa fa-group')); ?></li>
                    </ul>
                    <ul class="list-inline navbar-right top-social">
                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.google.com/maps"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="https://www.google.com.vn/?gfe_rd=cr&ei=EHrcWIGeIoPfoAOsnL64Aw"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>   
        <!-- Slider -->
        <div class="featured container">
            <div class="row">
                <div class="col-sm-8">
                    <!-- Carousel -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2>Welcome to Us! </h2>
                                        <br>
                                        <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                        <br>
                                    </div>
                                </div><!-- /header-text -->
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/2.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2>Welcome to Us!</h2>
                                        <br>
                                        <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                        <br>
                                    </div>
                                </div><!-- /header-text -->
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                                <!-- Static Header -->
                                <div class="header-text hidden-xs">
                                    <div class="col-md-12 text-center">
                                        <h2>Welcome to Us!</h2>
                                        <br>
                                        <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                        <br>
                                    </div>
                                </div><!-- /header-text -->
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left" style="font-size:48px;margin-top: 167px;color:red;"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right" style="font-size:48px;color:red;margin-top: 167px;margin-left: -30px;"></span>
                        </a>
                    </div><!-- /carousel -->
                </div>
                <div class="col-sm-4" >
                    <div id="owl-demo-1" class="owl-carousel">
                        <?= $this->Html->image('/img/new/4.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                        <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                        <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                    </div>
                    <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:142px;width:360px;')); ?>
                </div>
            </div>
        </div>

        <!-- /////////////////////////////////////////Content -->
        <div id="page-content" class="index-page container">
            <?= $this->fetch('content'); ?>
        </div>

        <footer>
            <div class="wrap-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-footer footer-1">
                            <div class="footer-heading"><h1><span style="color: #fff;">IT CLUB</span></h1></div>
                            <div class="content">
                                <p>Never missed any post published in our site. Subscribe to our daly newsletter now.</p>
                                <strong>Email address:</strong>
                                <form action="#" method="post">
                                    <input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
                                    <input type="submit" value="SUBSCRIBE" class="btn btn-3" />
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-footer footer-1">
                            <div class="footer-heading"><h4>Content</h4></div>
                            <div class="content">
                                <a href="#">JVB</a><br>
                                <a href="#">HVKTQS</a><br>
                                <a href="#">Article</a><br>
                                <a href="#">Department</a><br>
                            </div>
                        </div>
                        <div class="col-md-4 col-footer footer-3">
                            <div class="footer-heading"><h4>Link List</h4></div>
                            <div class="content">
                                <ul>
                                    <li><a href="#">MOST VISITED COUNTRIES</a></li>
                                    <li><a href="#">5 PLACES THAT MAKE A GREAT HOLIDAY</a></li>
                                    <li><a href="#">PEBBLE TIME STEEL IS ON TRACK TO SHIP IN JULY</a></li>
                                    <li><a href="#">STARTUP COMPANY’S CO-FOUNDER TALKS ON HIS NEW PRODUCT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right">
                <p>Good lucky 2017 _ Thanks for watching</p>
            </div>
        </footer>
        <!-- Footer -->

        <!-- JS -->

        <?= $this->Html->script('owl.carousel'); ?>
        <script>
            $(document).ready(function () {
                $("#owl-demo-1").owlCarousel({
                    autoPlay: 3000,
                    items: 1,
                    itemsDesktop: [1199, 1],
                    itemsDesktopSmall: [400, 1]
                });
                $("#owl-demo-2").owlCarousel({
                    autoPlay: 3000,
                    items: 3,
                });
            });
        </script>

        <?= $this->Html->script('bootstrap-datetimepicker'); ?>
        <?= $this->Html->script('bootstrap-datetimepicker.fr'); ?>
        <?= $this->fetch('meta'); ?>
        <?= $this->fetch('css'); ?>
        <?= $this->fetch('script'); ?>
        <script type="text/javascript">
            $('.form_datetime').datetimepicker({
                //language:  'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
            $('.form_date').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
            $('.form_time').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
            });




            //demo ajax
            $(document).ready(function () {

                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function (data) {
                        alert('success');
                        return false;
                    }
                });
            })
        </script>
    </body>
</html>
