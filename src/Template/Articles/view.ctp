<?= $this->Html->css('view.css'); ?>
	<div>
		 <i class="icon-book"></i>
		<strong class="text-info"> <?= h($article->name) ?> </strong>
	</div><br>
	<div class="text-align: justify;">
		   <?=html_entity_decode($article->content) ?>
	</div>
	<strong>Time post:</strong>
	<?= h($article ->posted) ?><br>
	<strong>Views:</strong> <?= h($article->views) ?> <br>
	<i class="icon-user "> </i>
	<?= h($article ->id_user) ?>
	<br><br>
	  <?=  $this->Element('../articles/elelikes'); ?>    
	  <?=  $this->Element('../articles/eledislikes'); ?>    
	<div>
	  <?=  $this->Element('../comments/addcomment'); ?>    
	</div>
