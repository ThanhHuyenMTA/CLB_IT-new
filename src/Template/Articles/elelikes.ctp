<div style="float:left;">
<?= $this->Form->create(null, ['url' => ['controller' => 'Articles', 'action' => 'elelikes']]); ?>
	<button type="submit" style="font-size:24px;" class="icon-thumbs-up"></button>
	<?= h($viewAr ->likes) ?>
	<?=$this->request->session()->write('likes',$viewAr->likes) ?>
<?=$this->Form->end();?>
</div>