<?php echo $this->Html->css('gmail.css'); ?>
<style>
    .featured{
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row" style="background-color:white;">
        <div class="col-sm-2" style="background-color:rgba(189, 187, 187, 0.29);">
             <?=$this->Html->link('Compose',['action'=>'../Letters/composemail'])?><br><br>
             <?=$this->Html->link('Inbox',['action'=>'../Letters/inbox'])?><br><br>
             <?=$this->Html->link('SentMail',['action'=>'../Letters/sentmail'])?>
        </div>
        <div class="col-sm-10">
            <table class="table table-striped">
                <tbody>
                    <?php foreach ($letterReceiver as $value): ?>
                        <tr class="tablinks" onclick="openCity(event, 'Viewmail')" id="defaultOpen">
                            <td> 
                                <i class="fa fa-envelope"></i>
                            </td>
                            <td id="mail"> 
                                <?= $this->Html->link($value->letter->user->email, ['action' => '../Letters/view', $value->letter->id]) ?>
                            </td>
                            <?php echo $this->Form->hidden('Letter.id', ['value' => $value->letter->id]) ?>
                            <?php echo $this->Form->hidden('email', ['value' =>$value->letter->user->email]) ?>
                            <td><?= h($value->letter->name) ?></td>
                            <td><?= h($value->datesender) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
