<?php echo $this->Html->css('gmail.css'); ?>
<div id="page-content" class="index-page container">
    <div class="container-fluid">
        <div class="row" style="background-color:white;">
            <div class="col-sm-2" style="background-color:rgba(189, 187, 187, 0.29);">
                <?= $this->Html->link('Compose', ['action' => '../Letters/composemail']) ?><br><br>
                <?= $this->Html->link('Inbox ', ['action' => '../Letters/inbox']) ?><?php echo "(" . $number . ")"; ?><br><br>
                <line>
                <?= $this->Html->link('SentMail', ['action' => '../Letters/sentmail']) ?>
            </div>
            <div class="col-sm-10">
                <table class="table table-striped">
                    <tbody>
                        <?php foreach ($letterSender as $value): ?>
                            <?php foreach ($value->transactions as $value1): ?>
                                <tr>
                                    <td id="mail"> 
                                        To:<?= $this->Html->link($value1->user->email, ['action' => '../Letters/viewsender', $value->id, $value1->user->id], array('style' => 'color:black;')) ?>
                                    </td>
                                    <td><?= h($value->name) ?></td>
                                    <td><?= h($value1->datesender) ?></td>
                                </tr>  
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


