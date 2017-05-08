<div id="page-content" class="index-page container">
    <div class="box">
        <div class="box-header header-natural">
            <h2>Kết quả tìm thấy </h2>
        </div>
        <div class="box-content">
            <div class="row">
                <?php foreach ($functionFind as $value): ?>
                    <div class="col-md-6" style="height:360px;">
                        <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                        <h3><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                        <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                            <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                        </p>
                        <span><i class="fa fa-heart"></i>  <?= $value->likes ?> / <i class="fa fa-calendar"></i>  <?= $value->created ?> / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> <?= $value->views ?></span>
                        <br> 
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </span>
                        <p> <?= substr($value->content, 0, 200); ?>...</p>
                        <?= $this->request->session()->write('id_department', $value->id_department); ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>



