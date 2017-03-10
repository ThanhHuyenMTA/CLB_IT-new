<div style="padding-left: 60px;">
<?= $this->Form->create('Articles', ['url' => ['controller' => 'Articles', 'action' => 'eledislikes']]); ?>
	<?php echo $this->Form->hidden('Articles.id', ['value'=> $article->id])?>
	<?php echo $this->Form->hidden('Articles.dislikes', ['value'=> $article->dislikes])?>
	<button type="submit" style="font-size:24px;" class="icon-thumbs-down"></button>
	<?= h($article ->dislikes) ?>
	<!--<?=$this->request->session()->write('dislikes',$article->dislikes) ?> -->
<?=$this->Form->end();?>
</div>