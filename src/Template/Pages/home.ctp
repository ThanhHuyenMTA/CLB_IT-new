<html>
    <div class="row">

        <div id="main-content"><!-- background not working -->
            <!--   khung 6 -->

            <div class="col-md-8">
                <!--photo-->
                <div class="box">
                    <div class="box-header header-photo">
                        <h2>Photos</h2>
                    </div>
                    <div class="box-content">
                        <div id="owl-demo-2" class="owl-carousel">
                            <div class="item">
                                <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/2.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/4.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/8.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/9.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/10.png', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Lập trình C</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article1 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <a href="#"><?= $value->user->username ?></a>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                    </p>
                                    <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->posted ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                                    <br> 
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </span>
                                    <p> <?= substr($value->content, 0, 200); ?>...</p>
                                    <?= $this->request->session()->write('id_department', $value->id_department); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Lập trình Java</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article2 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/2.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <a href="#"><?= $value->user->username ?></a>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                    </p>
                                    <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->posted ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                                    <br> 
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </span>
                                    <p> <?= substr($value->content, 0, 200); ?> ...</p>

                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- next --> 
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Bảo trì ứng dụng</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article3 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <a href="#"><?= $value->user->username ?></a>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                    </p>
                                    <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->posted ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                                    <br> 
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </span>
                                    <p> <?= substr($value->content, 0, 200); ?> ...</p>

                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Cơ sở dữ liệu</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article4 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/4.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <a href="#"><?= $value->user->username ?></a>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                    </p>
                                    <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->posted ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                                    <br> 
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </span>
                                    <p> <?= substr($value->content, 0, 200); ?> ...</p>

                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div id="sidebar">

            <div class="col-md-4">

                <!---- Start Widget search---->
                <div class="widget wid-tags">
                    <div class="heading"><h4>Search</h4></div>
                    <div class="content">
                        <form role="form" class="form-horizontal" method="post" action="">
                            <input type="text" placeholder="Enter Search Keywords" value="" name="v_search" id="v_search" class="form-control">
                        </form>
                    </div>
                </div>

                <!---- Start Widget top comment ---->
                <div class="widget wid-comment">
                    <div class="heading"><h4>Top Comments</h4></div>
                    <div class="content">
                        <?php foreach ($comment as $value): ?>
                            <div class="post">
                                <a href="#">
                                    <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                                </a>                     
                                <div class="wrapper">
                                    <a href="#"><h5><?= html_entity_decode($value->content); ?>...</h5></a>
                                    <ul class="list-inline">
                                        <li><i class="fa fa-calendar"></i>  <?= h($value->created) ?></li> 
                                        <li><i class="fa fa-thumbs-up"></i><?= h($value->likes) ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!---- Start Widget video---->
                <div class="widget wid-vid">
                    <div class="heading">
                        <h4>Videos</h4>
                    </div>

                    <div class="content">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#most">Most Plays</a></li>
                            <li><a data-toggle="tab" href="#popular">Popular</a></li>
                            <li><a data-toggle="tab" href="#random">Random</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="most" class="tab-pane fade in active">
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="youtube">Youtube</span>
                                            <a href="https://www.youtube.com/watch?v=rE9aKGtQyXk" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/16.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">Vimeo</span>
                                            <a href="https://www.youtube.com/watch?v=gBRG4AQdeM4" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/17.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="youtube">Youtube</span>
                                            <a href="https://www.youtube.com/watch?v=uj6aMop0kI8" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/18.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="popular" class="tab-pane fade">
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="youtube">Youtube</span>
                                            <a href="https://www.youtube.com/watch?v=vZZDyrWTlcw" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/19.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="youtube">Youtube</span>
                                            <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/19.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">Vimeo</span>
                                            <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/19.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="random" class="tab-pane fade">
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">Vimeo</span>
                                            <a href="https://www.youtube.com/watch?v=_H3IZKIx63k" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/19.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">Vimeo</span>
                                            <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/20.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">Vimeo</span>
                                            <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                                <i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
                                            </a>
                                            <p>Video's Name</p>
                                        </div>
                                        <?= $this->Html->image('/img/new/20.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:105px;')); ?>
                                    </div>
                                    <div class="wrapper">
                                        <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                        <div class="info">
                                            <h6>By <a href="#">Kelvin</a></h6>
                                            <span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!---- Start Widget top articles new ---->  
                <div class="widget wid-new-post">
                    <div class="heading"><h4>New Posts</h4></div>
                    <div class="content">
                        <?php foreach ($articleview as $value): ?>
                            <h6><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h6>
                            <?= $this->Html->image('/img/new/21.jpg', array('alt' => 'CakePHP', 'style' => 'height:153px;width:230px;')); ?>
                            <ul class="list-inline">
                                <li>
                                    <p>By <a href="#" style="color:red;"><?= $value->user->username ?></a>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                    </p>
                                </li><br>
                                <li><i class="fa fa-calendar"></i> <?= h($value->posted) ?></li> 
                                <li><i class="fa fa-comments"></i> 1,200</li>
                                <li><i class="fa fa-eye"></i> <?= h($value->views) ?></li><br>
                                <p><?= html_entity_decode(substr($value->content, 0, 100)); ?>...</p>
                            </ul>


                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>

</html>