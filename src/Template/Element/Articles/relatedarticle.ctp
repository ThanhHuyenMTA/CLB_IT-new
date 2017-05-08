<div class="widget ">
    <div class="heading"><h4>Related Articles</h4></div>
    <div class="content">
        <?php $numb = 1 ?>
        <?php foreach ($relatedarticle as $value): ?>
            <div class="wrap-vid">
                <div class="zoom-container">
                    <div class="zoom-caption">
                        <span class="vimeo">New <?= $numb ?></span>
                        <?= $this->Html->link('Detail', ['action' => '/view/', $value->id], array('class' => 'fa fa-play-circle-o fa-5x', 'style' => 'margin-top:75px;')) ?>
                    </div>
                    <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:225px;width:330px;')); ?>
                </div>

                <div class="info">
                    <?= $this->Html->link($value->name, ['action' => '/view/', $value->id], array('class' => 'nameA')) ?>
                    <h5>By   <?= $this->Html->link($value->user->username, ['action' => '../users/view/', $value->user->id]) ?>
                        <i class="fa fa-calendar"></i>25/3/2015
                    </h5>
                </div>
            </div>
            <br>
            <?php $numb+=1 ?>

        <?php endforeach; ?>
    </div>
</div>
