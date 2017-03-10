
<!-- file css -->
<?= $this->Html->css('Moicake.css') ;?>
<!--end css-->

<h1 style="text-align:left;font-weight: bold;">Articles in menu...</h1>
    <?php foreach ($article as $value): ?>

       <div class="hometc"> 
        <i class="icon-book"></i>
        <strong>
           <?= $this->Html->link($value->name,['action' => '../articles/view', $value->id]) ?>
        </strong><br>
        <?= substr( $value->content,0,301);?>
        .......    
        <br>
            <strong>Views: </strong>
                 <?= $value->views ?>
        <blockquote class="pull-right">
            <strong>Time post:</strong>
                <?= $value->posted ?>
            <br> <strong><i class="icon-user"> 
                      <?= $this->Html->link($value->user->username,['action' =>'#']) ?>
                  </i>
                </strong>  

        </blockquote>
      </div>
    <?php endforeach; ?>

<!--Phan trang-->
<div class="pagination">
  <ul>
    <li><?php echo $this->Paginator->numbers(); ?></li>
  </ul>
</div>     
