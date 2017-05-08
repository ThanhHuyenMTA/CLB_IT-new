<html>
    <div class="featured container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($imgedepar as $value): ?>
                    <?php if ($value->image): ?>
                        <?= $this->Html->image('/img/depart/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                    <?php else: ?>
                        <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                    <?php endif; ?>
                    <div class="depart-text hidden-xs">
                        <div class="col-md-12 ">
                            <h4>Welcome to <?= $value->name ?></h4>
                        </div>
                    </div>    
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <h4>Top member you can know</h4>
                <?php foreach ($user as $value): ?>
                    <div class="post">
                        <a href="#">
                            <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                        </a>                     
                        <div class="wrapper" style="margin-left: 25px;">
                            <h5>
                                <?= $this->Html->link($value->user->name, ['action' => '../users/view', $value->user->id]) ?> 
                            </h5>
                            <i class="fa fa-calendar"></i>  <?= h($value->created) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <div id="page-content" class="index-page container">
        <div class="">
            <div class="row">
                <div id="main-content" class="col-md-8">  
                    <!--thong tin-->
                    <!--load post articles-->
                    <?php if ($loggedIn && $userEmbark): ?>   
                        <?= $this->Element('articles/addarticle'); ?>
                    <?php endif; ?>
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
                                <!--Like or dislike-->
                                <form  class="likeOdis" method="post" id="fm_like<?= $value->id ?>" >
                                    <input name="username"type="hidden" value="<?php echo $this->request->session()->read('Auth.User.username'); ?>" />
                                    <input name="id" id="ida" type="hidden" value="<?php echo $value->id ?>" />
                                    <input name="likes" id="like" type="hidden" value="<?php echo $value->likes ?>" />
                                    <input name="created" type="hidden" value="<?php echo date("Y/m/d") ?>"/>
                                    <input name="dislikes" id="dislike" type="hidden" value="<?php echo $value->dislikes ?>" />
                                    <?php $checkliked = 0; ?>
                                    <?php $checkdisliked = 0; ?>

                                    <?php foreach ($liked as $valuelike): ?>
                                        <?php if (($valuelike->id_article) == ($value->id)): ?>
                                            <?php $checkliked+=1 ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <?php foreach ($disliked as $valuedislike): ?>
                                        <?php if (($valuedislike->id_article) == ($value->id)): ?>
                                            <?php $checkdisliked+=1 ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <?php if ($checkliked == 1): ?>
                                        <button type="button"  class="fa fa-thumbs-o-up postlike-<?php echo $value->id ?>" onclick="likea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>')" id="likes" title="Tôi thích post này !" style="color:red;"> </button>
                                        <div id="resultlike<?= $value->id ?>" style="float:left;" > 
                                            <?= $value->likes ?>
                                        </div>
                                    <?php else: ?>
                                        <button type="button"  class="fa fa-thumbs-o-up postlike-<?php echo $value->id ?>" onclick="likea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>')" id="likes" title="Tôi thích post này !"> </button>
                                        <div id="resultlike<?= $value->id ?>" style="float:left;" > 
                                            <?= $value->likes ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($checkdisliked == 1): ?>
                                        <button type="button" class="fa fa-thumbs-o-down postdislike-<?php echo $value->id ?>"onclick="dislikea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>')" id="likes" title="Tôi không thích post này !" style="color:blue;"> </button>        
                                        <div id="resultdislike<?= $value->id ?>" style="float:left;width:50px;">
                                            <?= $value->dislikes ?>
                                        </div>
                                    <?php else: ?>
                                        <button type="button" class="fa fa-thumbs-o-down postdislike-<?php echo $value->id ?>"onclick="dislikea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>')" id="likes" title="Tôi không thích post này !"> </button>        
                                        <div id="resultdislike<?= $value->id ?>" style="float:left;width:50px;">
                                            <?= $value->dislikes ?>
                                        </div>
                                    <?php endif; ?>

                                </form>
                                <br>

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
                                <div class="zoom-container" id="imgA" >
                                    <?php if ($value->image): ?>
                                        <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?>
                                    <?php else: ?>
                                        <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="contentA">
                                    <p><?= substr($value->content, 0, 301); ?></p>
                                    <?= $this->Html->link('Read More...', ['action' => '/view/', $value->id], array('class' => 'changelink')) ?>
                                </div>
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



                </div>

                <div id="sidebar" class="col-md-4">
                    <!---- Start tham gia ban ---->
                    <div class="widget wid-follow">

                        <?= $this->Element('Departments/embarkdepart'); ?>

                        <?php if ($userRole): ?>
                            <div class="approval">
                                <?= $this->Html->link(' Approval', ['action' => '../Approvals/approval'], array('class' => 'fa fa-bug', 'target' => '_blank')); ?>
                                (<?php print $numberarticle; ?>/<?php print $numberuser; ?>)
                            </div>
                        <?php endif; ?>
                    </div>

                    <!---- Start Widget ---->
                    <div class="widget ">
                        <div class="heading"><h4>Top Latest Articles</h4></div>
                        <div class="content">
                            <?php $numb = 1 ?>
                            <?php foreach ($articlenew as $value): ?>
                                <div class="wrap-vid">
                                    <div class="zoom-container">
                                        <div class="zoom-caption">
                                            <span class="vimeo">New <?= $numb ?></span>
                                            <?= $this->Html->link('Detail', ['action' => '/view/', $value->id], array('class' => 'fa fa-play-circle-o fa-5x', 'style' => 'margin-top: 40px;')) ?>
                                        </div>
                                        <?php if ($value->image): ?>
                                            <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:140px;width:330px;')); ?>
                                        <?php else: ?>
                                            <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:140px;width:330px;')); ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="info">
                                        <?= $this->Html->link($value->name, ['action' => '/view/', $value->id], array('class' => 'nameA')) ?>
                                        <h5>By   <?= $this->Html->link($value->user->username, ['action' => '../users/view/', $value->user->id]) ?>
                                            <i class="fa fa-calendar"></i>25/3/2015
                                        </h5>
                                    </div>
                                </div>
                                <br>
                                <?php $numb+=1 ?>

                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</html>
<?= $this->Element('articles/like_dislikeajax'); ?> 

