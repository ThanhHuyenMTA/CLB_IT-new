<?= $this->Form->create(null, ['url' => ['action' => '../Articles/likeArticle', $value->id]]); ?>
<button class="fa fa-thumbs-o-up" style="font-size:16px;background-color: white;" name="likeA" id="likes"> </button>
<span> <?= $value->likes ?> </span>
<?php echo $this->Form->hidden('likes', ['value' => $value->likes]) ?>
<button class="fa fa-thumbs-o-down" style="font-size:16px;background-color: white;" name="dislikeA" id="likes"> </button>
<span> <?= $value->dislikes ?> </span>
<?php echo $this->Form->hidden('dislikes', ['value' => $value->dislikes]) ?>
<?= $this->Form->end(); ?>




