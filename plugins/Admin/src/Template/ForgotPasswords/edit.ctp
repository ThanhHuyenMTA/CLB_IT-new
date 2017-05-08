<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>chức năng Quên mật khẩu</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý chức năng Quên mật khẩu', array('controller' => 'ForgotPasswords', 'action' => 'index'));?></li>
        <li class="active"><?php echo $forgot['name_user'];?></li>
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
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('', array('class' => 'form-horizontal')); ?>
                    <div class="box-body">
                        <?php echo $this->Flash->render(); ?>
                        <div class="form-group">
                            <div class="col-sm-10 text-right">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal_resetpass">Gửi lại mail reset mật khẩu</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <?php echo $this->Form->input('email', array(
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                                ],
                                'class' => 'form-control',
                                'required' => true,
                                'readonly' => true,
                                'value' => $forgot['email']
                                )); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mã code</label>
                            <?php echo $this->Form->input('code', array(
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                                ],
                                'class' => 'form-control',
                                'required' => true,
                                'readonly' => false,
                                'value' => $forgot['code']
                                )); ?>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Trạng thái</label>
                            <?php echo $this->Form->input('status', array(
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                                ],
                                'class' => 'form-control',
                                'required' => true,
                                'readonly' => false,
                                'value' => $forgot['status']
                                )); ?>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thời gian gửi link</label>
                             <?php echo $this->Form->input('created', array(
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                                ],
                                'class' => 'form-control',
                                'readonly' => true,
                                'value' => $forgot['created']
                                ));?>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thời gian reset mật khẩu</label>
                             <?php echo $this->Form->input('modified', array(
                                'label' => false,
                                'templates' => [
                                    'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                                ],
                                'class' => 'form-control',
                                'readonly' => true,
                                'value' => $forgot['modified']
                                ));?>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12" style="  text-align:center;">
                                <?= $this->Html->Link('Hủy',['action' => 'index'], ['class'=>'btn btn-default']);  ?>
                                <?= $this->Form->button('Lưu', ['class'=>'btn btn-primary', 'type' => 'submit','formnovalidate' => true]);  ?>
                            </div>
                        </div>

                    </div><!-- /.box -->
                <?php echo $this->Form->end() ?>
                <div id="myModal_resetpass" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Gửi lại mail</h4>
                      </div>
                      <div class="modal-body">
                        <p>Bạn có muốn gửi lại mail reset mật khẩu?</p>
                      </div>
                      <div class="modal-footer">
                        <?php echo $this->Html->link('Có',['action' => 're_sent','id' => $forgot['id']],[
                                    'label' => false,
                                    'class' => 'btn btn-primary'
                                    ]); ?>
                        <button type="button" class="btn btn-default button_all" data-dismiss="modal">Không</button>
                      </div>
                    </div>

                  </div>
                </div>
            </div><!--/.col (right) -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->