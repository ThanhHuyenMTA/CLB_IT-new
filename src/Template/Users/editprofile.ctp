<html>
    <?php echo $this->Html->css('editprofile.css'); ?>
    <div class="">
        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="row">
                    <!-- load image -->
                    <div class="col-xs-3">
                        <?php if ($user->image): ?>
                            <?= $this->Html->image('new/' . $user['image'], array('alt' => 'CakePHP', 'style' => 'height:150px;width:150px;')); ?><br><br>
                        <?php else: ?>
                            <?= $this->Html->image('new/39.png', array('alt' => 'CakePHP', 'style' => 'height:150px;width:150px;')); ?><br><br>
                        <?php endif; ?>
                        <!-- edit picture user -->
                        <?php echo $this->Form->create(null, ['type' => 'file']); ?>
                        <label class="btn btn-primary" f or="my-file-selector" style="color: black;background-color: #eff3f6;font-weight: bold;width: 160px;">
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
                    <div class="col-xs-9">
                        <div class="widget wid-follow">
                            <div class="content">
                                <?php echo $this->Form->create($user); ?>
                                <?php echo $this->Form->input('name'); ?>
                                <?php echo $this->Form->input('birthday'); ?>
                                <?php echo $this->Form->input('phone'); ?>
                                <?php echo $this->Form->input('address'); ?>
                                <?php echo $this->Form->input('job'); ?>
                                <?php echo $this->Form->input('email'); ?>
                                <?php echo $this->Form->input('username'); ?>
                                <?php echo $this->Form->input('password'); ?>
                                <?php
                                echo $this->Form->input('Boy', ['type' => 'checkbox', 'value' => 'male', 'name' => 'sex']
                                );
                                ?>
                                <?php
                                echo $this->Form->input('Girl', ['type' => 'checkbox', 'value' => 'femal', 'name' => 'sex']
                                );
                                ?>
                                <?php echo $this->Form->button(__('Edit Profile')); ?>
                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
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





















