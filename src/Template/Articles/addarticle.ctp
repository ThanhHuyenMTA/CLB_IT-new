<?php echo $this->Html->script('ckeditor/ckeditor');?>
<?= $this->Html->css('addAr.css'); ?>
	<?=$this->Form->create();?>
 	    <?= $this->Form->control('name', ['type' => 'name','placeholder'=>'Name']); ?>  
 		<br>
   		<?= $this->Form->textarea('content',array('class'=>'ckeditor','value'=>"")); ?>   
    	<button class="sumb" type="submit" name="post" >Posts</button>
    	<?= $this->Flash->render() ?>
	<?=$this->Form->end();?>

<script type=”text/javascript”>
	CKEDITOR.replace('content', {
	language: 'vi',
	});
</script>


<!-- <?= $this->Form->input('id',['type'=>'select','options'=>$embark,'empty'=>'-Select Department-','class'=>'form-control','templateVars'=>['class'=>'col-md-4']]);?>
	</div>
<?= $this->Form->control('content', ['type' => 'textarea','placeholder'=>'Please write here content articles...']); ?> -->
