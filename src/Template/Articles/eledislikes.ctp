<div style="padding-left: 60px;">
<?= $this->Form->create('Articles', ['url' => ['controller' => 'Articles', 'action' => 'eledislikes']]); ?>
	<?php echo $this->Form->hidden('Articles.id', ['value'=> $viewAr->id])?>
	<?php echo $this->Form->hidden('Articles.dislikes', ['value'=> $viewAr->dislikes])?>
	<button type="submit" style="font-size:24px;" class="icon-thumbs-down"></button>
	<?= h($viewAr ->dislikes) ?>
	<!--<?=$this->request->session()->write('dislikes',$viewAr->dislikes) ?> -->
<?=$this->Form->end();?>
</div>