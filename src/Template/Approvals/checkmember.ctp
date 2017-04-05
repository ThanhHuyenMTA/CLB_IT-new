<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($member as $value): ?>
            <tr>
                <td> <?= h($value->user->username) ?></td>
                <td> <?= h($value->user->email) ?></td>
                <td style="width: 80px;">
                    <?= $this->Form->create('', ['url' => ['action' => '../Approvals/approval']]); ?>
                    <?= $this->Form->hidden('id_user', ['value'=>$value->user->id]) ?>
                    <?= $this->Form->button(__(' Yes'), ['name'=>'YesM','class' => 'fa fa-check-square-o']); ?>       
                    <?= $this->Form->end(); ?>
                </td>
                <td style="width: 80px;"><?= $this->Form->button(__(' No'), ['class' => 'fa fa-square-o']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>