<div class="box">
    <div class="box-content">
        <div class="row">
            <?php foreach ($relatedarticle as $value): ?>
            <div class="col-md-6" style="height: 380px;">
                    <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                    <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                    <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->posted ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                    <span class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </span>
                    <p> <?= substr($value->content, 0, 200); ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>