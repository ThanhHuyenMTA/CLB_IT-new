<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Nhà tuyển dụng   </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý ứng viên', array('controller' => 'Customers', 'action' => 'employee'));?></li>
        <li class="active"><?php echo $customer['full_name'];?></li>
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
                    <h3 class="box-title"><?php echo $customer['full_name'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create('', array('class' => 'form-horizontal',"type" => "file"));
                echo '<div class="box-body">';
                echo $this->Flash->render();

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên</label>';
                echo $this->Form->input('Customer.full_name', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $customer['full_name']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên đăng nhập</label>';
                echo $this->Form->input('Customer.username', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $customer['username']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Email</label>';
                echo $this->Form->input('Customer.email', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $customer['email']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Mật khẩu</label>';
                echo $this->Form->input('Customer.password', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control'
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Nhập lại mật khẩu</label>';
                echo $this->Form->input('Customer.confirm_password', array(
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
                echo $this->Form->input('Customer.mobile', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'number',
                    'value' => $customer['mobile']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Số lượng cv được xem</label>';
                echo $this->Form->input('Customer.number_view', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'number',
                    'value' => $customer['number_view']
                    ));
                echo '</div>';

                 echo '<div class="form-group">';
                echo '<label for="textArea" class="col-lg-2 control-label">Hình ảnh công ty</label>';
                echo '<div class="col-lg-3" style="margin-left: 16px;">';
                echo '<div>'  ;
                if($customer->avatart){
                    echo $this->Html->image($this->request->webroot . $customer->avatart);
                }
                echo '</div>';
                echo '<div style="margin-top:10px; margin-left:10px;" class="form-group">';
                echo '<div class="btn btn-default image-preview-input user_employee_profile_input_change" style="margin-top:20px">';
                echo '<span class="glyphicon glyphicon-folder-open"></span>';
                echo '<span class="image-preview-input-title">Chọn ảnh khác</span>';
                echo '<input name="Customer[avatart]" type="file" id="exampleInputFile" class = "btn btn-default image-preview-input user_employee_profile_input_change">';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="form-group">';    
                echo '<label class="col-sm-2 control-label">Trạng thái</label>';
                $isActive = $customer['status']? true: false;
                echo $this->Form->input('Customer.status', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => $isActive,
                    'style' => '-webkit-appearance: checkbox;'
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Xóa</label>';
                $deleted = $customer['deleted']? true: false;
                echo $this->Form->input('Customer.deleted', array(
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
                            'controller' => 'Customers',
                            'action' => 'employee'
                        ),
                        array(
                            'class' => 'btn btn-default',
                            'style' => 'margin-left:45%'
                        ));
                echo '<button type="submit" class="btn btn-info pull-right" style = "margin-right:45%">Lưu</button>';
                echo '</div>';

                echo $this->Form->end()
                ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->