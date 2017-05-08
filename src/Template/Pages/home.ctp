<html>
    <!-- Slider home -->
    <div class="featured container">
        <div class="row">
            <div class="col-sm-8">
                <!-- Carousel -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                            <!-- Static Header -->
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                    <h2>Welcome to Us! </h2>
                                    <br>
                                    <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                    <br>
                                </div>
                            </div><!-- /header-text -->
                        </div>
                        <div class="item">
                            <?= $this->Html->image('/img/new/2.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                            <!-- Static Header -->
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                    <h2>Welcome to Us!</h2>
                                    <br>
                                    <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                    <br>
                                </div>
                            </div><!-- /header-text -->
                        </div>
                        <div class="item">
                            <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:420px;width:750px;')); ?>
                            <!-- Static Header -->
                            <div class="header-text hidden-xs">
                                <div class="col-md-12 text-center">
                                    <h2>Welcome to Us!</h2>
                                    <br>
                                    <h5 style="color:black;">The informatics club is a place where exchange, sharing and learning with each other.Let's register to join us !!!</h5>
                                    <br>
                                </div>
                            </div><!-- /header-text -->
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left" style="font-size:48px;margin-top: 167px;color:red;"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right" style="font-size:48px;color:red;margin-top: 167px;margin-left: -30px;"></span>
                    </a>
                </div><!-- /carousel -->
            </div>

            <div class="col-sm-4" >
                <div id="owl-demo-1" class="owl-carousel">
                    <?= $this->Html->image('/img/new/4.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                    <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                    <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:207px;width:368px;')); ?>
                </div>
                <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:142px;width:360px;')); ?>
            </div>
        </div>
    </div>

    <!---------------Content---------------->
    <div id="page-content" class="index-page container">
        <div class="row">
            <!--   khung 8 -->

            <div class="col-md-8">
                <!--photo-->
                <div class="box">
                    <div class="box-header header-photo">
                        <h2>Photos</h2>
                    </div>
                    <div class="box-content">
                        <div id="owl-demo-2" class="owl-carousel">
                            <div class="item">
                                <?= $this->Html->image('/img/new/1.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/2.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/3.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/4.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/5.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/6.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/7.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/8.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                            <div class="item">
                                <?= $this->Html->image('/img/new/9.jpg', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                                <?= $this->Html->image('/img/new/10.png', array('alt' => 'CakePHP', 'style' => 'height:98px;width:175px;')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Lập trình C</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article1 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><img alt="" src="http://mta.edu.vn/portals/0/newnew.gif">
                                        <?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> 
                                    </h3>
                                    <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                        ---
                                        <i class="fa fa-calendar"></i>  <?= $value->created->i18nFormat('YYY-MM-dd'); ?> 
                                    </p>
                                    <p> <?= substr($value->content, 0, 200); ?>...</p>
                                    <?= $this->request->session()->write('id_department', $value->id_department); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Lập trình Java</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article2 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><img alt="" src="http://mta.edu.vn/portals/0/newnew.gif"><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                        ---
                                        <i class="fa fa-calendar"></i>  <?= $value->created->i18nFormat('YYY-MM-dd'); ?> 
                                    </p>
                                    <p> <?= substr($value->content, 0, 200); ?>...</p>
                                    <?= $this->request->session()->write('id_department', $value->id_department); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- next --> 
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Bảo trì ứng dụng</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article3 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><img alt="" src="http://mta.edu.vn/portals/0/newnew.gif"><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                        ---
                                        <i class="fa fa-calendar"></i>  <?= $value->created->i18nFormat('YYY-MM-dd'); ?> 
                                    </p>
                                    <p> <?= substr($value->content, 0, 200); ?>...</p>
                                    <?= $this->request->session()->write('id_department', $value->id_department); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <!-- next -->
                <div class="box">
                    <div class="box-header header-natural">
                        <h2>Cơ sở dữ liệu</h2>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <?php foreach ($article4 as $value): ?>
                                <div class="col-md-6">
                                    <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:148px;width:250px;')); ?>
                                    <h3><img alt="" src="http://mta.edu.vn/portals/0/newnew.gif"><?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> </h3>
                                    <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                        ---
                                        <i class="fa fa-calendar"></i>  <?= $value->created->i18nFormat('YYY-MM-dd'); ?> 
                                    </p>
                                    <p> <?= substr($value->content, 0, 200); ?>...</p>
                                    <?= $this->request->session()->write('id_department', $value->id_department); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <div class="col-md-4">
                    <!---- Start Widget search---->
                    <div class="widget wid-tags">
                        <div class="heading"><h4>Search</h4></div>
                        <div class="content">
                            <?= $this->Form->create('', ['url' => ['controller' => 'Finds', 'action' => 'findarticle'], array('class' => 'form-horizontal')]); ?>

                            <input type="text" placeholder="Enter Search Keywords" value="" name="v_search" id="v_search" class="form-control">
                            <input type="submit" name="ok" value="search" style="margin-left: 270px; margin-top: 5px;" />

                            <?= $this->Form->end; ?>
                        </div>
                    </div>
                    <!---- Start Widget department ----> 
                    <div class="widget wid-new-post">
                        <div class="heading"><h4>Departments</h4></div>
                        <?php foreach ($department as $value): ?>
                            <li>
                                <?= $this->Html->link($value->name, ['action' => '../Articles/listarticle', $value->id]) ?>
                            </li>
                        <?php endforeach; ?>

                    </div>
                    <!---- Start Widget top articles new ---->  
                    <div class="widget wid-new-post">
                        <div class="heading"><h4>New Posts</h4></div>
                        <div class="content">
                            <?php foreach ($articleview as $value): ?>
                                <h6><img alt="" src="http://mta.edu.vn/portals/0/newnew.gif">
                                    <?= $this->Html->link($value->name, ['action' => '../articles/view', $value->id]) ?> 
                                </h6>
                                <?= $this->Html->image('/img/new/' . $value->image, array('alt' => 'CakePHP', 'style' => 'height:153px;width:300px;')); ?>
                                <ul class="list-inline">
                                    <li>
                                        <p>By <?= $this->Html->link($value->user->username, ['action' => '../users/view', $value->user->id], array('style' => 'color:red')) ?>
                                            <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:20px;width:20px; border-radius: 50%;')); ?>
                                        </p>
                                    </li>
                                    <li><p><i class="fa fa-calendar"></i> 
                                            <?= h($value->created) ?></p>
                                    </li> 
                                    <p><?= html_entity_decode(substr($value->content, 0, 100)); ?>...</p>
                                </ul>


                            <?php endforeach; ?>
                        </div>
                    </div>


                    <!---- Start Widget top comment ---->
                    <div class="widget wid-comment">
                        <div class="heading"><h4>Top Comments</h4></div>
                        <div class="content">
                            <?php foreach ($comment as $value): ?>
                                <div class="post">
                                    <a href="#">
                                        <?= $this->Html->image('new/' . $value->user['image'], array('alt' => 'CakePHP', 'style' => 'height:50px;width:50px; border-radius: 50%;')); ?>
                                    </a>                     
                                    <div class="wrapper">
                                        <a href="#"><h5><?= html_entity_decode($value->content); ?>...</h5></a>
                                        <ul class="list-inline">
                                            <li><p><i class="fa fa-calendar"></i>  <?= h($value->created) ?></p></li> 
                                            <li><p><i class="fa fa-thumbs-up"></i><?= h($value->likes) ?></p></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</html>

<script>
    $(document).ready(function () {
        $(".voteup").click(function () {
            var Id = $(this).children("p").text();
            $(this).children("#article_thumbsUp").load("/posts/voteup/" + Id);
        });
    });
//    var r = confirm("\n\n\Hello!Welcome you visit our website!\n\n\
//             Please log in for the most rewarding experience !");
//    if (r == true) {
//        window.location = "../NewCLB/users/login";
//    }
</script>

