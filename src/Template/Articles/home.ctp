
<!-- file css -->
<?= $this->Html->css('Moicake.css') ;?>
<!--end css-->

<h1 style="text-align:left;font-weight: bold;"> Newest Posts </h1>
    <?php foreach ($baidang as $totl): ?>

    <div class="hometc"> 
        <strong>
           <?= $this->Html->link($totl->name,['action' => '../articles/view', $totl->id]) ?>
        </strong><br>
        <?= substr( $totl->content,0,301);?>
        .......
        <br>
            <strong>Views: </strong>
                 <?= $totl->views ?>
        <blockquote class="pull-right">
            <strong>Time post:</strong>
                <?= $totl->posted ?>
            <br>......  <i class="icon-user"></i> ......
        </blockquote>
    </div>
    <?php endforeach; ?>

<!--Phan trang-->
<div class="pagination">
  <ul>
    <li><?php echo $this->Paginator->numbers(); ?></li>
  </ul>
</div>     
