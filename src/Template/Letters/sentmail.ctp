
<table class="table table-striped">
    <tbody>
        <?php foreach ($letterSender as $value): ?>
            <?php foreach ($value->transactions as $value1): ?>
                <tr>
                    <td id='mail'>To: <?= h($value1->user->email) ?> </td>
                    <td><?= h($value->name) ?></td>
                    <td><?= h($value1->datesender) ?></td>
                </tr>  
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>


