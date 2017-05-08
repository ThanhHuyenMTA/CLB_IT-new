<?php echo $this->Html->css('gmail.css'); ?>

<!-- Slider home -->
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

<div id="page-content" class="index-page container">
    <div class="row">
        <div class="col-sm-9">
            <div class="box">
                <h6> Helllo you!!!! </h6>
                <p>Câu lạc bộ It _ Nơi các bạn học hỏi, giao lưu ,trao đổi thông tin-kiến thức cho nhau.
                    Nơi mà bạn thể hiện khả năng của bản thân mình trong nghành mà bạn quan tâm.Đấy chính là IT.<br>
                    Khi bạn bước vào thế giới của công nghệ ,khi đó máy tính sẽ giúp bạn rất nhiều. Những thông tin 
                    cần thiết sẽ được tìm hiểu kỹ càng hơn. Và hơn nữa bạn sẽ tìm được những thông tin mà mình cần.<br>   
                </p>
                <p>
                    Cho dù bạn nơi đâu thì việc trao đổi , kết giao với tất cả mọi người là không bị giới hạn. Chỉ cần bạn thích ,
                    Chỉ cần bạn quan tâm và hứng thú tới điều đó.
                </p>
                <p>
                    Đây là nơi bạn có thể giao lưu với tất cả mọi người , khi đó bạn có thể gửi những gì mình muốn trao đổi cho họ.
                </p>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="box">
                <div class="heading"><h6>Some members you may know :</h6></div>
                <?php foreach ($top_user as $value): ?>
                    <div class="post">
                        <a href="#">
                            <?= $this->Html->image('new/' . $value['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                        </a>                     
                        <div class="wrapper" style="margin-left: 25px;">
                            <a href="#">
                                <p>
                                    <?= $this->Html->link($value->name, ['action' => '../users/view', $value->id]) ?> 
                                </p>
                            </a>
                            <ul class="list-inline">
                                <li>  <i class="fa fa-calendar"></i>  <?= h($value->birthday) ?></li> 

                            </ul>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>