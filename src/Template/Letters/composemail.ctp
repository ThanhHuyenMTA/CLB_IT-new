<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Html->css('gmail.css'); ?>
<div id="page-content" class="index-page container">
    <div class="container-fluid">
        <div class="row" style="background-color:white;">
            <div class="col-sm-2" style="background-color:rgba(189, 187, 187, 0.29);">
                <?= $this->Html->link('Compose', ['action' => '../Letters/composemail'], array('class' => 'colo')) ?><br><br>
                <?= $this->Html->link('Inbox ', ['action' => '../Letters/inbox']) ?><?php echo "(" . $number . ")"; ?><br><br>
                <line>
                <?= $this->Html->link('SentMail', ['action' => '../Letters/sentmail']) ?>
            </div>
            <div class="col-sm-10">
                <p class="newletter">New letter</p>
                <?= $this->Form->create('Letters', ['id' => 'ff']); ?>
                <label>         
                    <span>Enter name receiver:</span>
                    <input type="email" name="email" id="email" required="" placeholder="To: ">
                    <?= $this->Form->hidden('created', ['value' => date('Y-m-d H:i:s')]) ?>
                </label>
                <label>
                    <span>Enter name letter:</span>
                    <input type="text"  name="name" id="name" placeholder="Subject" required>
                </label>
                <label>
                    <span>Enter content:</span>
                    <textarea class="ckeditor" value="" name="content" ></textarea>
                </label>
                <input class="sendemailButton" type="submit" name="Submit" value="Send">
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script type=”text/javascript”>
    CKEDITOR.replace('content', {
        language: 'vi',
    });
</script>









