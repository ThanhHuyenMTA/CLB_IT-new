<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<div class="">
    <div class="row">
        <div id="main-content" class="col-md-8">
            <div class="box">
                <h2 class="vid-name"><?= h($article->name) ?></h2>
                <div class="info">
                    <h5>By <a href="#">Kelvin</a></h5>
                    <span><i class="fa fa-calendar"></i><?= h($article->posted) ?></span> 
                    <span><i class="fa fa-comment"></i> 0 Comments</span>
                    <span><i class="fa fa-heart"></i> <?= $article->views ?></span>
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
                    <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?><br>
                    <?= html_entity_decode($article->content) ?>	
                </div>
            </div>
            <hr class="line"><hr class="line">

            <!-- COMMENT -->

            <div class="box">
                <?= $this->Element('../comments/addcomment'); ?>  	
            </div>

            <!-- RELATED ARTICLES -->
            <div class="box">
                <h2 style="text-align: center;">RELATED ARTICLES</h2>
                <?= $this->Element('../articles/relatedarticle'); ?>  
            </div>
            <hr class="line">

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
                                <a href="https://www.youtube.com/watch?v=B_VEzSJ8dKg&list=PLaVenFjHENfH-15mYIMRPYEFjIBLLlgjr" target="black
                                   ">
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

<script type=”text/javascript”>
    CKEDITOR.replace('content', {
        language: 'vi',
    });
</script>
