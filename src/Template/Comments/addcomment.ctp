<?php echo $this->Html->script('ckeditor/ckeditor');?>
<style>
   label{
      display: none;
   }
</style>
<div style="font-weight: bold;">
   <h3>Comments</h3>
   <div style="width:100%;">
      <?= $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'addcomment']]); ?>
		    <!-- <?= $this->Form->control('content', ['type' => 'textarea','placeholder'=>'Please write here if you have comments...']); ?>  -->

         <?= $this->Form->textarea('content',array('class'=>'ckeditor','value'=>"")); ?>   
			   <button class="sumb" type="submit" name="comment" >Comment</button>
			   <?= $this->Flash->render() ?>
		  <?php echo $this->Form->end();?>
   </div>
    <?=  $this->Element('../comments/loadcomment'); ?>    
</div>

<script type=”text/javascript”>

    CKEDITOR.replace('content', {
    language: 'vi',
    });
    htmlspecialchars('content', ENT_COMPAT);//dùng cái này để mã hóa dữ liệu từ ckeditor
    html_entity_decode($data, ENT_QUOTES, 'UTF-8');//
 
</script>


