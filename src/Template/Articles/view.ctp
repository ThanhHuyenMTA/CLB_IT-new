<?= $this->Html->css('view.css'); ?>
<div><strong class="text-info"> <?= h($viewAr->name) ?> </strong></div><br>
<div class="text-align: justify;">
	   <?= h($viewAr ->content) ?>
</div>
<strong>Time post:</strong>
<?= h($viewAr ->posted) ?><br>
<strong>Views:</strong> <?= h($viewAr ->views) ?> <br>
<i class="icon-user "> </i>
</br>
  <?=  $this->Element('../articles/elelikes'); ?>    
  <?=  $this->Element('../articles/eledislikes'); ?>    
<div>
  <?=  $this->Element('../comments/addcomment'); ?>    
</div>