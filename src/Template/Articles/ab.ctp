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
                <button type="button"  class="fa fa-thumbs-o-up postlike-<?php echo $value->id ?>" onclick="likea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>')" id="likes" title="Tôi thích post này !"> </button>
                <div id="resultlike<?= $value->id ?>" style="float:left;" > 
                    <?= $value->likes ?>
                </div>
                <button type="button" class="fa fa-thumbs-o-down postdislike-<?php echo $value->id ?>"onclick="dislikea('<?php echo '#fm_like' . $value->id ?>', '<?php echo '#resultdislike' . $value->id ?>', '<?php echo '#resultlike' . $value->id ?>')" id="likes" title="Tôi không thích post này !"> </button>
                <div id="resultdislike<?= $value->id ?>" style="float:left;width:50px;">
                    <?= $value->dislikes ?>
                </div>
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
                <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?>
            </div>
            <p><?= substr($value->content, 0, 301); ?></p>
            <?= $this->Html->link('Read More...', ['action' => '/view/', $value->id], array('class' => 'changelink')) ?>
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



<div class="box">
    <center><h3><strong>Join us for the new experiences !!!</strong></h3></center>
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
