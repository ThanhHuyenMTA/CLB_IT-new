<?php echo $this->Html->css('gmail.css'); ?>
<style>
    .featured{
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row" style="background-color:white;">
        <div class="col-sm-2" style="background-color:rgba(189, 187, 187, 0.29);">
            <?= $this->Html->link('Compose', ['action' => '../Letters/composemail']) ?><br><br>
            <?= $this->Html->link('Inbox ', ['action' => '../Letters/inbox']) ?><?php echo "(".$number.")";?><br><br>
            <line>
            <?= $this->Html->link('SentMail', ['action' => '../Letters/sentmail']) ?>
        </div>
        <div class="col-sm-10">
            <?php foreach ($letter as $value): ?>
            <strong>From:</strong>
            <?=$value->letter->user->username;?>
            (  <?=$value->letter->user->email;?> )------- <?=$value->datesender;?>
            <br><br>
            <?=  html_entity_decode($value->letter->content);?>
            
            <?php endforeach; ?>
        </div>
    </div>
</div>


