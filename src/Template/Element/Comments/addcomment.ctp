<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
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
    <div class="box-header header-natural">
        <h2>Comments</h2>
    </div>
    
    <div style="width:100%;">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'addcomment'], array('id' => 'fm_comment')]); ?>   
        <textarea class="ckeditor" value="" name="content" onclick="ClickO" required="false"></textarea>
        <button  style="margin-left: 650px;margin-top: 8px;" class="sumb" type="submit" name="comment" >Comment</button>
        <?php echo $this->Form->end(); ?>
    </div>
    <?= $this->Element('comments/loadcomment'); ?>    
</div>
<script language="javascript">
    function ClickO() {
        $('#cke_1_top').css('display', 'inherit');
    }
//    function checklogin(login) {
//        if (login == null)
//        {
//            if (confirm('Please login!')) {
//               
//            }
//        } 
//    }
</script>


