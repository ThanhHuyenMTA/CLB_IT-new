<html>
    <div class="">
        <div class="row">
            <div id="main-content" class="col-md-8">  

                <!--load post articles-->
                <?php if ($loggedIn && $userEmbark): ?>
                    <?= $this->Element('../articles/addarticle'); ?>
                    <!--end post-->
                    <?php foreach ($article as $value): ?>
                        <div class="box">
                            <h2><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h2>
                            <div class="info">
                                <h5>By <a href="#"><?= $value->user->username ?></a>
                                    <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                </h5>
                                <span><i class="fa fa-calendar"></i><?= $value->created ?></span> 
                                <span><i class="fa fa-comment"></i> 0 Comments</span>
                                <span ><i class="fa fa-heart"></i><?= $value->views ?></span>

                                <?= $this->Form->create(null, ['url' => ['action' => '../Articles/likeArticle', $value->id]]); ?>
                                <button class="fa fa-thumbs-o-up" style="font-size:16px;background-color: white;" name="likeA" id="likes"> </button>
                                <span> <?= $value->likes ?> </span>
                                <?php echo $this->Form->hidden('likes', ['value' => $value->likes]) ?>
                                <button class="fa fa-thumbs-o-down" style="font-size:16px;background-color: white;"name="dislikeA" id="likes"> </button>
                                <span> <?= $value->dislikes ?> </span>
                                <?php echo $this->Form->hidden('dislikes', ['value' => $value->dislikes]) ?>
                                <?= $this->Form->end(); ?>

                                <!--<?= $this->request->session()->write('id_department', $value->id_department); ?>  -->
                                <!--  <?= $this->request->session()->write('email_department', $value->department->email); ?> -->
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

                <?php else: ?>
                    <div class="box">
                        <center><h3><strong>Join us for a new experience !!!</strong></h3></center>
                        <h5 class="line"></h5>
                        <h5>Some members you may know :</h5>
                        <?php foreach ($userdepart as $value): ?>
                            <div class="post" style="float: left; margin-left:20px;">
                                <a href="#">
                                    <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                                </a>                     
                                <h5>
                                    <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id]) ?> 
                                </h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


            </div>

            <div id="sidebar" class="col-md-4">
                <!---- Start tham gia ban ---->
                <div class="widget wid-follow">
                    <div class="heading"><h4>Welcome to US </h4></div>
                    <div class="content" style="float: left;">
                        <?= $this->Element('../departments/embarkdepart'); ?>
                    </div>
                    <?php if ($userRole): ?>
                        <div class="approval">
                            <?= $this->Html->link(' Approval', ['action' => '../Approvals/approval'], array('class' => 'fa fa-bug', 'target' => '_blank')); ?>
                            (<?php print $numberarticle;?>/<?php print $numberuser;?>)
                        </div>

                    <?php endif; ?>
                </div>
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
                    </div>
                </div>
                <!---- Start top Member ---->
                <div class="widget wid-post" >
                    <div class="heading"><h4>Top Members</h4></div>
                    <div class="content">
                        <?php foreach ($user as $value): ?>
                            <div class="post">
                                <a href="#">
                                    <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                                </a>                     
                                <div class="wrapper" style="margin-left: 25px;">
                                    <a href="#">
                                        <h5>
                                            <?= $this->Html->link($value->user->name, ['action' => '../users/view', $value->user->id]) ?> 
                                        </h5>
                                    </a>
                                    <ul class="list-inline">
                                        <li>  <i class="fa fa-calendar"></i>  <?= h($value->created) ?></li> 

                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>

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
