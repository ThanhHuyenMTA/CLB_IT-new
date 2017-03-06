<style>
   label{
      display: none;
   }
</style>
<div style="font-weight: bold;">
   <h3>Comments</h3>
   <div style="width:100%;">
      <?= $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'addcomment']]); ?>
		     <?= $this->Form->control('content', ['type' => 'textarea','placeholder'=>'Please write here if you have comments...']); ?>    
			   <button class="sumb" type="submit" name="comment" >Comment</button>
			   <?= $this->Flash->render() ?>
		  <?php echo $this->Form->end();?>
   </div>
    <?=  $this->Element('../comments/loadcomment'); ?>    
</div>

