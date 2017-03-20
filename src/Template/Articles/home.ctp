
<!-- file css -->
<?= $this->Html->css('Moicake.css') ;?>
<!--end css-->

<h1 style="text-align:left;font-weight: bold;"> Newest Posts </h1>
    <?php foreach ($baidang as $totl): ?>
    <div class="hometc">
        <span style="font-weight: bold;">
           <?= $this->Html->link($totl->name,['action' => '../articles/view', $totl->id]) ?>
        </span>
        <br>
        <?= substr( $totl->content,0,301);?>
        .......
        <br>
        Time post:
        <?= $totl->posted ?>
        <br>
        Views:
        <?= $totl->views ?>
    </div>
    <?php endforeach; ?>

<!--Phan trang-->
<div class="pagination">
  <ul>
    <li><?php echo $this->Paginator->numbers(); ?></li>
  </ul>
</div>     
