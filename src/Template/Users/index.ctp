<!-- File: src/Template/Articles/index.ctp -->

<h1>Blog user</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Email</th>
        <!--<th>Password</th>-->
        <th>Created</th>
        <th>Modified</th>
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out totl info -->

    <?php foreach ($users as $totl): ?>
    <tr>
        <td><?= $totl->id ?></td>
        <td><?= $totl->name ?></td>
        <td><?= $totl->sex ?></td>
        <td>
            <?= $this->Html->link($totl->email, ['action' => 'view', $totl->id]) ?>
        </td>
      <!--  <td><?= $totl->password ?></td> -->
        <td><?= $totl->created ?></td>
        <td><?= $totl->modified ?></td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $totl->id]) ?>
        </td>
        <td>
           <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $totl->id],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?= $this->Html->css('Moicake.css') ;?>
<?= $this->fetch('css'); ?>


<!--Phan trang-->
<div class="pagination">
  <ul>
    <li><?php echo $this->Paginator->numbers(); ?></li>
  </ul>
</div>     