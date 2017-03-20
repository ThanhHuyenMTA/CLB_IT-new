<?php foreach ($relatedarticle as $value): ?>
    <div class="box">
        <h2><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h2>
        <div class="info">
            <h5>By <a href="#">Kelvin</a></h5>
            <span><i class="fa fa-calendar"></i><?= $value->posted ?></span> 
            <span><i class="fa fa-comment"></i> 0 Comments</span>
            <span><i class="fa fa-heart"></i> <?= $value->views ?></span>
            <ul class="list-inline">
                <li><a href="#">Rate</a></li>
                <li> - </li>
                <li>
                    <span class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </span>
                </li>
            </ul>
        </div>

        <div class="wrap-vid">
            <div class="zoom-container">
                <div class="zoom-caption">
                </div>
                <?= $this->Html->image('/img/new/12.jpg', array('alt' => 'CakePHP', 'style' => 'height:141px;width:250px;')); ?>
            </div>
        </div>

    </div>
    <hr class="line">
<?php endforeach; ?>