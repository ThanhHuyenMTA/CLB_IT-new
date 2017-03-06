<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:<?= $this->fetch('title'); ?>
    </title>
    <?= $this->Html->meta('icon'); ?>

    <?= $this->Html->css('bootstrap.css'); ?>
    <?= $this->Html->css('bootstrap-responsive.css'); ?>
    <?= $this->Html->css('style.css'); ?>
    <?= $this->Html->css('Themmoi.css'); ?>
    <?= $this->Html->css('loginm.css') ;?>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic"/>
     
   

    <?= $this->Html->css('font.css'); ?>
    <!-- end: CSS -->
    <?= $this->Html->script('jquery-1.8.2'); ?>
    <?= $this->Html->script('bootstrap'); ?>
    <?= $this->Html->script('flexslider'); ?>
    <?= $this->Html->script('carousel'); ?>
    <?= $this->Html->script('custom'); ?>

    <?= $this->fetch('meta'); ?>
    <?= $this->fetch('css'); ?>
    <?= $this->fetch('script');?>
</head>
<body>
    <div id="wrapper">

        <!--start: Container -->
        <div class="container">


            <!--start: Header -->
            <header>

                <!--start: Row -->
                <div class="row">

                    <!--start: Logo -->
                    <div class="logo span4">
                        <a class="brand" href="#"><?= $this->Html->image('/img/logo.png', array('alt' => 'CakePHP', 'style' => 'height: 61px; float:left;')); ?></a>
                    </div>
                    <!--end: Logo -->
                    <!--start: Social Links -->
                    <div class="span8">
                        <div id="social-links">
                            <ul class="social-small-grid">
                                <li>
                                    <div class="social-small-item">
                                        <div class="social-small-info-wrap">
                                            <div class="social-small-info">
                                                <div class="social-small-info-front social-small-twitter">
                                                    <a href="http://twitter.com"></a>
                                                </div>
                                                <div class="social-small-info-back social-small-twitter-hover">
                                                    <a href="http://twitter.com"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="social-small-item">
                                        <div class="social-small-info-wrap">
                                            <div class="social-small-info">
                                                <div class="social-small-info-front social-small-facebook">
                                                    <a href="http://facebook.com"></a>
                                                </div>
                                                <div class="social-small-info-back social-small-facebook-hover">
                                                    <a href="http://facebook.com"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="social-small-item">
                                        <div class="social-small-info-wrap">
                                            <div class="social-small-info">
                                                <div class="social-small-info-front social-small-dribbble">
                                                    <a href="http://dribbble.com"></a>
                                                </div>
                                                <div class="social-small-info-back social-small-dribbble-hover">
                                                    <a href="http://dribbble.com"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="social-small-item">
                                        <div class="social-small-info-wrap">
                                            <div class="social-small-info">
                                                <div class="social-small-info-front social-small-flickr">
                                                    <a href="http://flickr.com"></a>
                                                </div>
                                                <div class="social-small-info-back social-small-flickr-hover">
                                                    <a href="http://flickr.com"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <!--end: Social Links -->

                </div>
                <!--end: Row -->

            </header>
            <!--end: Header-->
            <!--start: Navigation-->
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li class="active">
                                    <?= $this->Html->link('Home', ['action' => '../']) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('Introduce', ['action' => '#']) ?>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departments<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-header">
                                           <a href="#">
                                               <?=  $this->Element('../Departments/listmenu'); ?>    
                                           </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php if($loggedIn) : ?>
                                            <li class="nav-header">
                                              <?= $this->Html->link('Logout', ['action' => '../users/logout']) ?>
                                            </li>
                                            <li class="nav-header" style="margin-top: 0px;">
                                              <?= $this->Html->link('Profile', ['action' => '../users/view']) ?>
                                            </li>
                                            <li class="active" style="color: red; padding-left:28px" >
                                               <?= $this->request->session()->read('Auth.User.username') ?>
                                            </li>
                                        <?php else : ?>
                                             <li class="nav-header">
                                               <?= $this->Html->link('Login',['action' => '../users/login']) ?>
                                            </li>
                                            <li class="nav-header"> 
                                             <?= $this->Html->link('Registration',['action' => '../users/registration/']) ?>
                                            </li>

                                        <?php endif  ?>

                                    </ul>
                                </li>
                                <li >
                                    <?= $this->Html->link('Post Articles', ['action' =>'../Articles/addarticle']) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Navigation-->

        </div>
        <!--end: Container-->
        <!--start: Container -->


        <div class="container">

            <!-- start: Flexslider -->
            <div class="slider">

                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <?= $this->Html->image('/img/slider/slider1.jpg', array('alt' => 'CakePHP', 'style' => 'height:300px;width: 968px;')); ?>
                            <div class="slide-caption n hidden-phone">
                                <h3>Câu lạc bộ Tin Học</h3>
                                <p>
                                    Câu lạc bộ tin học là nơi giao lưu, chia sẻ và học hỏi kiến thức với nhau. Hãy đăng ký thành viên và bắt đầu nào !
                                </p>
                            </div>
                        </li>
                        <li>
                            <?= $this->Html->image('/img/slider/slider2.jpg', array('alt' => 'CakePHP', 'style' => 'height:300px;width: 968px;')); ?>
                            <div class="slide-caption hidden-phone">
                                <h3>Câu lạc bộ Tin Học</h3>
                                <p>
                                    Câu lạc bộ tin học là nơi giao lưu, chia sẻ và học hỏi kiến thức với nhau. Hãy đăng ký thành viên và bắt đầu nào !
                                </p>
                            </div>
                        </li>
                        <li>
                            <?= $this->Html->image('/img/slider/slider3.jpg', array('alt' => 'CakePHP', 'style' => 'height:300px;width: 968px;')); ?>
                            <div class="slide-caption n hidden-phone">
                                <h3>Câu lạc bộ Tin Học</h3>
                                <p>
                                    Câu lạc bộ tin học là nơi giao lưu, chia sẻ và học hỏi kiến thức với nhau. Hãy đăng ký thành viên và bắt đầu nào !
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <hr>
            <!--start: Container -->
            <?= $this->Flash->render(); ?>
            <div class="container">
               <?= $this->fetch('content');?>
            </div>
            <!--end: Container-->
            <hr>


            <!--start: Container -->
            <div class="container">
                <!-- start: Footer Menu -->
                <div id="footer-menu" class="hidden-tablet hidden-phone">
                    <!-- start: Container -->
                    <div class="container">

                        <!-- start: Row -->
                        <div class="row">
                            <!-- start: Footer Menu Logo -->
                            <div class="span1">
                                <div id="footer-menu-logo">
                                    <a href="#"><?= $this->Html->image('/img/logo-footer-menu.png', array('alt' => 'CakePHP')); ?></a>  
                                </div>
                            </div>
                            <!-- end: Footer Menu Logo -->
                            <!-- start: Footer Menu Links-->
                            <div class="span10">

                                <div id="footer-menu-links">
                                    <ul id="footer-nav">
                                        <li><a href="index.html">Start</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>

                            </div>
                            <!-- end: Footer Menu Links-->
                            <!-- start: Footer Menu Back To Top -->
                            <div class="span1">

                                <div id="footer-menu-back-to-top">
                                    <a href="#"></a>
                                </div>

                            </div>
                            <!-- end: Footer Menu Back To Top -->

                        </div>
                        <!-- end: Row -->

                    </div>
                    <!-- end: Container  -->
                </div>
                <!-- end: Footer Menu -->
                <!-- start: Footer -->
                <div id="footer">

                    <!-- start: Container -->
                    <div class="container">

                        <!-- start: Row -->
                        <div class="row">
                            <!-- start: About -->
                            <div class="span3">

                                <h3>About Us</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                </p>

                            </div>
                            <!-- end: About -->
                            <!-- start: Photo Stream -->
                            <div class="span3">

                                <h3>Photo Stream</h3>
                                <div class="flickr-widget">
                                    <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&display=latest&size=s&layout=x&source=user&user=29609591@N08"></script>
                                    <div class="clear"></div>
                                </div>

                            </div>
                            <!-- end: Photo Stream -->

                            <div class="span6">

                                <!-- start: Follow Us -->
                                <h3>Follow Us!</h3>
                                <ul class="social-grid">
                                    <li>
                                        <div class="social-item">
                                            <div class="social-info-wrap">
                                                <div class="social-info">
                                                    <div class="social-info-front social-twitter">
                                                        <a href="http://twitter.com"></a>
                                                    </div>
                                                    <div class="social-info-back social-twitter-hover">
                                                        <a href="http://twitter.com"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="social-item">
                                            <div class="social-info-wrap">
                                                <div class="social-info">
                                                    <div class="social-info-front social-facebook">
                                                        <a href="http://facebook.com"></a>
                                                    </div>
                                                    <div class="social-info-back social-facebook-hover">
                                                        <a href="http://facebook.com"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="social-item">
                                            <div class="social-info-wrap">
                                                <div class="social-info">
                                                    <div class="social-info-front social-dribbble">
                                                        <a href="http://dribbble.com"></a>
                                                    </div>
                                                    <div class="social-info-back social-dribbble-hover">
                                                        <a href="http://dribbble.com"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="social-item">
                                            <div class="social-info-wrap">
                                                <div class="social-info">
                                                    <div class="social-info-front social-flickr">
                                                        <a href="http://flickr.com"></a>
                                                    </div>
                                                    <div class="social-info-back social-flickr-hover">
                                                        <a href="http://flickr.com"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end: Follow Us -->
                                <!-- start: Newsletter -->
                                <form id="newsletter">
                                    <h3>Newsletter</h3>
                                    <p>Please leave us your email</p>
                                    <label for="newsletter_input"></label>
                                    <input type="text" id="newsletter_input" />
                                    <input type="submit" id="newsletter_submit" value="submit">
                                </form>
                                <!-- end: Newsletter -->

                            </div>

                        </div>
                        <!-- end: Row -->

                    </div>
                    <!-- end: Container  -->
                </div>
                <!-- end: Footer -->

            </div>
            <!-- end: Container  -->
        </div>


        <!-- end: Wrapper  -->
        <!-- start: Copyright -->
        <div id="copyright">

            <!-- start: Container -->
            <div class="container">

                <p>
                    &copy; 2013, creativeLabs. <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> Designed by BootstrapMaster in Poland 
                    <?= $this->Html->image('/img/poland.png', array('alt' => 'CakePHP', 'style' => 'margin-top:-4px')); ?>
                </p>

            </div>
            <!-- end: Container  -->

        </div>
        </div>
    </body>
</html>
