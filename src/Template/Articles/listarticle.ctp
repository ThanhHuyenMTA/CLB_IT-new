<html>
    <div class="">
        <div class="row">
            <div id="main-content" class="col-md-8">

                <?php foreach ($article as $value): ?>
                    <div class="box">
                        <h2><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h2>
                        <div class="info">
                            <h5>By <a href="#"><?= $value->user->username ?></a>
                                <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                            </h5>
                            <span><i class="fa fa-calendar"></i><?= $value->posted ?></span> 
                            <span><i class="fa fa-comment"></i> 0 Comments</span>
                            <span><i class="fa fa-heart"></i> <?= $value->views ?></span>
                            <?= $this->request->session()->write('id_department', $value->id_department); ?>
                            <ul class="list-inline">
                                <li><a href="#">Rate</a></li>
                                <li> - </li>
                                <li>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                </div>
                                <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?>
                            </div>
                            <p><?= substr($value->content, 0, 301); ?> <a href="#">MORE...</a></p>
                        </div>
                    </div>
                    <hr class="line">
                <?php endforeach; ?>

                <!-- phan trang -->

                <div class="box">
                    <center>
                        <ul class="pagination">
                            <li><?php echo $this->Paginator->prev('<<'); ?></li>
                            <li><?php echo $this->Paginator->numbers(); ?></li>
                            <li> <?php echo $this->Paginator->next('>>'); ?></li>
                        </ul>
                    </center>
                </div>
            </div>

            <div id="sidebar" class="col-md-4">
                <!---- Start Widget ---->
                <div class="widget wid-follow">
                    <div class="heading"><h4>Follow Us</h4></div>
                    <div class="content">
                        <ul class="list-inline">
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-facebook">
                                        <span class="fa fa-facebook fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-twitter">
                                        <span class="fa fa-twitter fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-google">
                                        <span class="fa fa-google-plus fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <?= $this->Html->image('/img/new/16.jpg', array('alt' => 'CakePHP', 'style' => 'height:131px;width:330px;')); ?>
                    </div>
                </div>
                <!---- Start Widget ---->
                <div class="widget wid-post">
                    <div class="heading"><h4>Category</h4></div>
                    <div class="content">
                        <div class="post wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="youtube">Youtube</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:125px;')); ?>
                            </div>
                            <div class="wrapper">
                                <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                <div class="info">
                                    <h6>By <a href="#">Kelvin</a></h6>
                                    <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                    <span><i class="fa fa-heart"></i>1,200</span>
                                </div>
                            </div>
                        </div>
                        <div class="post wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="vimeo">Vimeo</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:125px;')); ?>
                            </div>
                            <div class="wrapper">
                                <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                <div class="info">
                                    <h6>By <a href="#">Kelvin</a></h6>
                                    <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                    <span><i class="fa fa-heart"></i>1,200</span>
                                </div>
                            </div>
                        </div>
                        <div class="post wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="youtube">Youtube</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:70px;width:125px;')); ?>
                            </div>
                            <div class="wrapper">
                                <h5 class="vid-name"><a href="#">Video's Name</a></h5>
                                <div class="info">
                                    <h6>By <a href="#">Kelvin</a></h6>
                                    <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                    <span><i class="fa fa-heart"></i>1,200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---- Start Widget ---->
                <div class="widget ">
                    <div class="heading"><h4>Top News</h4></div>
                    <div class="content">
                        <div class="wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="vimeo">Vimeo</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:186px;width:330px;')); ?>
                            </div>
                            <h3 class="vid-name"><a href="#">Video's Name</a></h3>
                            <div class="info">
                                <h5>By <a href="#">Kelvin</a></h5>
                                <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                <span><i class="fa fa-heart"></i>1,200</span>
                            </div>
                        </div>
                        <div class="wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="vimeo">Vimeo</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/8.jpg', array('alt' => 'CakePHP', 'style' => 'height:186px;width:330px;')); ?>
                            </div>
                            <h3 class="vid-name"><a href="#">Video's Name</a></h3>
                            <div class="info">
                                <h5>By <a href="#">Kelvin</a></h5>
                                <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                <span><i class="fa fa-heart"></i>1,200</span>
                            </div>
                        </div>
                        <div class="wrap-vid">
                            <div class="zoom-container">
                                <div class="zoom-caption">
                                    <span class="vimeo">Vimeo</span>
                                    <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black">
                                        <i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
                                    </a>
                                    <p>Video's Name</p>
                                </div>
                                <?= $this->Html->image('/img/new/9.jpg', array('alt' => 'CakePHP', 'style' => 'height:186px;width:330px;')); ?>
                            </div>
                            <h3 class="vid-name"><a href="#">Video's Name</a></h3>
                            <div class="info">
                                <h5>By <a href="#">Kelvin</a></h5>
                                <span><i class="fa fa-calendar"></i>25/3/2015</span> 
                                <span><i class="fa fa-heart"></i>1,200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>