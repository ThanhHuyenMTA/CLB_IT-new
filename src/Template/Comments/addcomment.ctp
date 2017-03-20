<?php echo $this->Html->script('ckeditor/ckeditor');?>
<style>
    label{
        display: none;
    }
    textarea {
        width: 730px;
        height: 50px;
    }
</style>
<div style="font-weight: bold;">
    <h3>Comments</h3>
    <div style="width:100%;">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'addcomment']]); ?>   
        <textarea class="ckeditor" value="" name="content"></textarea>
        <button style="margin-left: 650px;margin-top: 8px;" class="sumb" type="submit" name="comment" >Comment</button>
        <?php echo $this->Form->end(); ?>
    </div>
    <?= $this->Element('../comments/loadcomment'); ?>    
</div>


