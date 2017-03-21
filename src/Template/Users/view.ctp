<html>
    <style>
        .featured {
            display: none;
        }
    </style>
    <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
    <div class="">
        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="row">
                    <!-- load image -->
                    <div class="col-xs-4">
                        <?= $this->Html->image('new/'.$user['image'], array('alt' => 'CakePHP', 'style' => 'height:150px;width:150px;')); ?><br><br>
                        <!-- edit picture user -->
                        <?php echo $this->Form->create(null, ['type' => 'file']); ?>
                            <label class="btn btn-primary" f or="my-file-selector" style="color: black;background-color: #eff3f6;font-weight: bold;">
                                <input id="my-file-selector" type="file" style="display:none;" name='uploadfile' multiple='multiple' onchange="$('#upload-file-info').html($(this).val());">
                                <i class="fa fa-arrow-circle-o-up"></i> Upload new picture !
                            </label>
                            <span class='label label-info ' id="upload-file-info"></span>
                           <!-- <?= $this->Form->file('uploadfile', ['multiple']); ?> -->
                           <!-- <?= $this->Form->button('submit', ['type' => 'submit']); ?> -->
                        <?php echo $this->Form->end(); ?>
                        <!-- end edit picture user -->
                        <br>
                    </div>
                    <!-- function user -->
                    <div class="col-xs-8">
                        <div class="widget wid-follow">
                            <div class="content">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <div class="box-facebook" style="width:130px; height:40px;" >
                                                <span class="fa fa-edit fa-1x icon"> Edit profile!</span>
                                            </div>
                                        </a>
                                        <p class="mt-3"><strong>ProTip!</strong> Updating your profile with your name, location, and a profile picture helps other GitHub users get to know you.</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="box-google" style="width:130px; height:40px;">
                                                <span class="fa fa-envelope fa-1x icon">  Send mail!</span>

                                            </div>
                                        </a>
                                        <p class="mt-3"><strong>ProTip!</strong> Please send the best news to your friends !!!</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>	
                <!-- load profile -->
                <div class="row">
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

    <script type=”text/javascript”>
        CKEDITOR.replace('content', {
            language: 'vi',
        });
    </script>

</html>