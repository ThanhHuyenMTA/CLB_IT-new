<!-- Header content -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Ứng viên</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý ứng viên', array('controller' => 'Customer', 'action' => 'employee'));?></li>
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

                <?php echo $this->Form->create($customer, array('class' => 'form-horizontal')); ?>
                <div class="box-body">
                    <?php echo $this->Flash->render(); ?>
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Tên <span class="error-message">*</span></label>
                    <div class="col-sm-8">
                      <?= $this->Form->input('full_name',['class' => 'form-control', 'id' => 'inputFullName', 'label' => false,'value' => $customer['full_name']]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Email <span class="error-message">*</span></label>
                    <div class="col-sm-8">
                      <?= $this->Form->input('email',['class' => 'form-control', 'id' => 'inputEmail', 'label' => false,'value' => $customer['email']]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Mật khẩu </label>
                    <div class="col-sm-8">
                      <?= $this->Form->input('password',['class' => 'form-control','value' => false, 'id' => 'inputPassword', 'label' => false]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Xác nhận mật khẩu </label>
                    <div class="col-sm-8">
                      <?= $this->Form->input('confirm_password',['type' => 'password', 'class' => 'form-control', 'id' => 'inputConfirmPassword','label' => false]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Số điện thoại <span class="error-message">*</span></label>
                    <div class="col-sm-8">
                      <?= $this->Form->input('mobile',['type' => 'number' ,'class' => 'form-control', 'id' => 'inputMobile', 'label' => false,'value' => $customer['mobile']]); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-8">
                        <?php $isActive = $customer['status']? true: false; 
                        echo $this->Form->input('status', array(
                            'label' => false,
                            'class' => 'form-control',
                            'type'=>'checkbox',
                            'checked' => $isActive,
                            'style' => '-webkit-appearance: checkbox;'
                            ));
                        ?>
                    </div>
                    </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Delete</label>
                    <div class="col-sm-8">
                        <?php $deleted = $customer['deleted']? true: false;
                            echo $this->Form->input('deleted', array(
                                'label' => false,
                                'class' => 'form-control',
                                'type' => 'checkbox',
                                'checked' => $deleted,
                                'style' => '-webkit-appearance: checkbox;',
                                'value' => 1
                                ));
                        ?>
                    </div>
                  </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                      <div class="col-sm-12 text-center">
                        <?= $this->Form->button('Hủy', ['class'=>'btn btn-default', 'type' => 'reset']);  ?>
                        <?= $this->Form->button('Lưu', ['class'=>'btn btn-primary', 'type' => 'submit','formnovalidate' => true]);  ?>
                      </div>
                    </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
    </div>
</section><!-- /.content