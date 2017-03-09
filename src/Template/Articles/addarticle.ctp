<?php echo $this->Html->script('ckeditor/ckeditor');?>
<?= $this->Html->css('addAr.css'); ?>
<?=$this->Form->create();?>
 	<?= $this->Form->control('name', ['type' => 'name','placeholder'=>'Name']); ?>  
 	<br>
  <!--  <?= $this->Form->control('content', ['type' => 'textarea','placeholder'=>'Please write here content articles...']); ?> -->
    <?= $this->Form->textarea('content',array('class'=>'ckeditor','value'=>"")); ?>   
    <button class="sumb" type="submit" name="post" >Posts</button>
    <?= $this->Flash->render() ?>
<?=$this->Form->end();?>
<div>
 <?php foreach ($embark as $value): ?>
 	 <?=h($value->department->name); ?>
	 <br>
 <?php endforeach; ?>

</div>







<script type=”text/javascript”>

	CKEDITOR.replace('content', {
	language: 'vi',
	});
	function check_cntintuc()
	{
		var noi_dung = $( 'content.editor' ).val();
	 	if(noi_dung="")
	    {
	        alert("Phần nội dung không được để trống.");
	        return false;
	    }
	}   

</script>
