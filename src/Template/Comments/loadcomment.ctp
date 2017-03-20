<?php foreach ($comment as $row): ?>
    <div class="widget wid-comment">
        <div class="content">
            <div class="post">
                <a href="single.html">
                    <?= $this->Html->image('/img/new/29.jpg', array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                </a>
                <div class="wrapper">
                    <a href="#" ><h5 style="color:#365899;"><?= h($row->user->username) ?></h5></a>
                    <?= html_entity_decode($row->content) ?>
                    <ul class="list-inline">
                        <li><i class="fa fa-calendar" > </i> <?=h($row->created)?></li> 
                        <li><i class="fa fa-thumbs-up"></i>  1,200</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- phan trang -->
<div class="box">
    <center>
        <ul class="pagination">
            <li><?php echo $this->Paginator->prev('<<'); ?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li> <?php echo $this->Paginator->next('>>'); ?></li>
        </ul>
    </center>
</div>