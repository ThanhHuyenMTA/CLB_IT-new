<?php echo $this->Html->css('gmail.css'); ?>
<div class="row">
    <div class="col-sm-9">
        <div class="box">
            <h6> Helllo you!!!! </h6>
            <p>Câu lạc bộ It _ Nơi các bạn học hỏi, giao lưu ,trao đổi thông tin-kiến thức cho nhau.
                Nơi mà bạn thể hiện khả năng của bản thân mình trong nghành mà bạn quan tâm.Đấy chính là IT.<br>
                Khi bạn bước vào thế giới của công nghệ ,khi đó máy tính sẽ giúp bạn rất nhiều. Những thông tin 
                cần thiết sẽ được tìm hiểu kỹ càng hơn. Và hơn nữa bạn sẽ tìm được những thông tin mà mình cần.<br>   
            </p>
            <p>
                Cho dù bạn nơi đâu thì việc trao đổi , kết giao với tất cả mọi người là không bị giới hạn. Chỉ cần bạn thích ,
                Chỉ cần bạn quan tâm và hứng thú tới điều đó.
            </p>
            <p>
                Đây là nơi bạn có thể giao lưu với tất cả mọi người , khi đó bạn có thể gửi những gì mình muốn trao đổi cho họ.
            </p>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
             <div class="heading"><h6>Some members you may know :</h6></div>
            <?php foreach ($top_user as $value): ?>
                <div class="post">
                    <a href="#">
                        <?= $this->Html->image('new/' . $value['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                    </a>                     
                    <div class="wrapper" style="margin-left: 25px;">
                        <a href="#">
                            <p>
                                <?= $this->Html->link($value->name, ['action' => '../users/view', $value->id]) ?> 
                            </p>
                        </a>
                        <ul class="list-inline">
                            <li>  <i class="fa fa-calendar"></i>  <?= h($value->birthday) ?></li> 

                        </ul>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
