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

                <td><?= h($value->letter->name) ?></td>
                <td><?= h($value->datesender) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>








