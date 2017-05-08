<table class="table">
        <thead>
            <tr>
                <th>Article Name </th>
                <th>User name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($article as $value): ?>
                <tr>
                    <td> <?= h($value->name) ?></td>
                    <td> <?= h($value->user->name) ?></td>
                    <td style="width: 80px;">
                        <?= $this->Form->create('', ['url' => ['action' => '../Approvals/approval']]); ?>
                        <?= $this->Form->hidden('id_article', ['value' => $value->id]) ?>
                        <?= $this->Form->button(__(' Yes'), ['name' => 'YesA', 'class' => 'fa fa-check-square-o']); ?>       
                        <?= $this->Form->end(); ?>
                    </td>
                    <td style="width: 80px;"><?= $this->Form->button(__(' No'), ['class' => 'fa fa-square-o']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


