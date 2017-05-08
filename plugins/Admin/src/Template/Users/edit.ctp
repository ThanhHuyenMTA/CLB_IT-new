<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Quản trị viên</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý quản trị viên', array('controller' => 'Users', 'action' => 'index'));?></li>
        <li class="active"><?php echo $user['full_name'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $user['full_name'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create('', array('class' => 'form-horizontal'));
                echo '<div class="box-body">';
                echo $this->Flash->render();

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên</label>';
                echo $this->Form->input('User.full_name', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $user['full_name']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Vai trò</label>';
                echo $this->Form->input('User.role', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'select',
                    'options' => array(
                        '' => '',
                        1 => 'Quản trị hệ thống', 
                        2 => 'Quản trị viên'
                    ),
                    'required' => true,
                    'value' => $user['role']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên đăng nhập</label>';
                echo $this->Form->input('User.username', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $user['username']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Email</label>';
                echo $this->Form->input('User.email', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $user['email']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Mật khẩu</label>';
                echo $this->Form->input('User.password', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control'
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Nhập lại mật khẩu</label>';
                echo $this->Form->input('User.confirm_password', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'password',
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Số điện thoại</label>';
                echo $this->Form->input('User.mobile', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'number',
                    'value' => $user['mobile']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Trạng thái</label>';
                $isActive = $user['status']? true: false;
                echo $this->Form->input('User.status', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => $isActive,
                    'style' => '-webkit-appearance: checkbox;',
                    'value' => 1
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Xóa</label>';
                $deleted = $user['deleted']? true: false;
                echo $this->Form->input('User.deleted', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type' => 'checkbox',
                    'checked' => $deleted,
                    'style' => '-webkit-appearance: checkbox;',
                    'value' => 1
                    ));
                echo '</div>';

                echo '<div class="box-footer">';
                echo $this->Html->link(
                        'Hủy', 
                        array(
                            'controller' => 'Users',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'btn btn-default'
                        ));
                echo '<button type="submit" class="btn btn-info pull-right">Lưu</button>';
                echo '</div>';

                echo $this->Form->end()
                ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->