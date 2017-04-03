<html>
    <style>
        .featured {
            display: none;
        }
    </style>
    <div class="">
        <div class="row">
            <div id="main-content" class="col-md-8">
             
                <div class="row" style="color:white;">
                      <div class="col-xs-3">
                        <?= $this->Html->image('new/' . $user['image'], array('alt' => 'CakePHP', 'style' => 'height:150px;width:150px;')); ?><br><br>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th><div><strong class="text-info">Item</strong></div></th>
                                    <th><div><strong class="text-info">Information</strong></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Username</strong></td>
                                    <td><?= h($user->name) ?></td>
                                </tr>
                                <tr>

                                    <td><strong>Sex</strong></td>
                                    <td><?= h($user->sex) ?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Birthday</strong></td>

                                    <td><?= h($user->birthday) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong></td>

                                    <td><?= h($user->phone) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Address</strong></td>

                                    <td><?= h($user->address) ?></td>
                                </tr>
                                <tr>   
                                    <td><strong>Job</strong></td>
                                    <td><?= h($user->job) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><?= h($user->email) ?></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div id="sidebar" class="col-md-4">
                <!---- Start Widget ---->
                <div class="widget wid-follow">
                    <div class="heading"><h4>Follow Us</h4></div>
                    <div class="content">
                        <ul class="list-inline">
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-facebook">
                                        <span class="fa fa-facebook fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-twitter">
                                        <span class="fa fa-twitter fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="facebook.com/">
                                    <div class="box-google">
                                        <span class="fa fa-google-plus fa-2x icon"></span>
                                        <span>1250</span>
                                        <span>Fans</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <?= $this->Html->image('/img/new/16.jpg', array('alt' => 'CakePHP', 'style' => 'height:131px;width:330px;')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>