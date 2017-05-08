<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php foreach ($article as $article): ?>
    <div id="page-content" class="index-page container">
        <div class="">
            <div class="row">
                <div id="main-content" class="col-md-8">
                    <div class="box">
                        <h2 class="vid-name"><?= h($article->name) ?></h2>
                        <div class="info">
                            <h5>By 
                                <?= $this->Html->link($article->user->username, ['action' => '../users/view/' . $article->user->id]) ?>
                            </h5>
                            <span><i class="fa fa-calendar"></i><?= h($article->created) ?></span> 
                            <span><i class="fa fa-comment"></i> <?=$numbercom?> Comments</span>
                            <span>
                                <i class="fa fa-heart"></i> <?= $article->views ?>
                            </span>
                            <form method="post" class="VlikeOdis" id="fm_like<?= $article->id ?>">
                                <input name="username"type="hidden" value="<?php echo $this->request->session()->read('Auth.User.username'); ?>" />
                                <input name="id" id="ida" type="hidden" value="<?php echo $article->id ?>" />
                                <input name="likes" id="like" type="hidden" value="<?php echo $article->likes ?>" />
                                <input name="created" type="hidden" value="<?php echo date("Y/m/d") ?>"/>
                                <input name="dislikes" id="dislike" type="hidden" value="<?php echo $article->dislikes ?>" />
                                <?php if ($liked == 1): ?>
                                    <button type="button"  class="fa fa-thumbs-o-up postlike-<?php echo $article->id ?>" onclick="likea('<?php echo '#fm_like' . $article->id ?>', '<?php echo '#resultlike' . $article->id ?>', '<?php echo '#resultdislike' . $article->id ?>')" id="likes" title="Tôi thích post này !"
                                            data-toggle="modal" data-target="#myModal" style="color:red;"> </button>
                                    <div id="resultlike<?= $article->id ?>" style="float:left;" > 
                                        <?= $article->likes ?>
                                    </div>
                                <?php else: ?>
                                    <button type="button"  class="fa fa-thumbs-o-up postlike-<?php echo $article->id ?>" onclick="likea('<?php echo '#fm_like' . $article->id ?>', '<?php echo '#resultlike' . $article->id ?>', '<?php echo '#resultdislike' . $article->id ?>')" id="likes" title="Tôi thích post này !"
                                            data-toggle="modal" data-target="#myModal" > </button>
                                    <div id="resultlike<?= $article->id ?>" style="float:left;" > 
                                        <?= $article->likes ?>
                                    </div>

                                <?php endif; ?>
                                <?php if ($disliked == 1): ?>
                                    <button type="button" class="fa fa-thumbs-o-down postdislike-<?php echo $article->id ?>"onclick="dislikea('<?php echo '#fm_like' . $article->id ?>', '<?php echo '#resultdislike' . $article->id ?>', '<?php echo '#resultlike' . $article->id ?>')" id="likes" title="Tôi không thích post này !"
                                            data-toggle="modal" data-target="#myModal" style="color:blue;"> </button>
                                    <div id="resultdislike<?= $article->id ?>" style="float:left;width:50px;">
                                        <?= $article->dislikes ?>
                                    </div>
                                <?php else: ?>
                                    <button type="button" class="fa fa-thumbs-o-down postdislike-<?php echo $article->id ?>"onclick="dislikea('<?php echo '#fm_like' . $article->id ?>', '<?php echo '#resultdislike' . $article->id ?>', '<?php echo '#resultlike' . $article->id ?>')" id="likes" title="Tôi không thích post này !"
                                            data-toggle="modal" data-target="#myModal"> </button>
                                    <div id="resultdislike<?= $article->id ?>" style="float:left;width:50px;">
                                        <?= $article->dislikes ?>
                                    </div>
                                <?php endif; ?>
                                <!--test check login-->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Hello you</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>You must be logged in to vote</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end test-->




                            </form>
                            <br>
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
                        <br>
                        <div class="wrap-vid">
                            <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?><br>
                            <?= html_entity_decode($article->content) ?>	
                        </div>
                    </div>
                    <hr class="line"><hr class="line">

                    <!-- COMMENT -->

                    <div class="box">
                        <?= $this->Element('comments/addcomment'); ?>  	
                    </div>

                </div>
                <!-- RELATED ARTICLES -->
                <div id="sidebar" class="col-md-4">
                    <?= $this->Element('articles/relatedarticle'); ?>  



                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script type=”text/javascript”>
    CKEDITOR.replace('content', {
        language: 'vi',
    });
</script>
<?= $this->Element('articles/like_dislikeajax'); ?>  
