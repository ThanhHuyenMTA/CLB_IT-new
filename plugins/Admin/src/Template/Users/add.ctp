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
        <li class="active">Thêm mới</li>
    </ol>
</section>

<!-- Main content -->
<div class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới quản trị viên</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($newUser, array('class' => 'form-horizontal')); ?>
                <div class="box-body">
                    <?php echo $this->Flash->render(); ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên<span class="error-message"> *</span></label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->input('full_name', array(
                            'label' => false,
                            'class' => 'form-control',
                            'id' => 'full_name'
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Vai trò<span class="error-message"> *</span></label>
                        <div class="col-sm-8">
                            <?php echo $this->Form->input('role', array(
                                'label' => false,
                                'class' => 'form-control',
                                'type'=>'select',
                                'options' => array(
                                    1 => 'Quản trị hệ thống', 
                                    2 => 'Quản trị viên'
                                )
                                )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email<span class="error-message"> *</span></label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->input('email', array(
                            'label' => false,
                            'class' => 'form-control'
                            )); ?>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mật khẩu<span class="error-message"> *</span></label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->input('password', array(
                            'label' => false,
                            'class' => 'form-control'
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nhập lại mật khẩu<span class="error-message"> *</span></label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->input('confirm_password', array(
                            'label' => false,
                            'class' => 'form-control',
                            'type'=>'password'
                            )); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Trạng thái</label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->input('status', array(
                            'label' => false,
                            'class' => 'form-control',
                            'type'=>'checkbox',
                            'style' => '-webkit-appearance: checkbox; margin: 0;'
                            )); ?>
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <!-- <a href="' . $this->url('category') . '" class="btn btn-default">Hủy</a> -->
                        <button type="submit" class="btn btn-primary" formnovalidate="true">Thêm mới</button>
                    </div>
                </div>

                <?php echo $this->Form->end(); ?>
            </div><!-- /.box -->
        </div><!-- /.col (right)  -->
    </div><!-- /.row -->
</div><!-- /.content -->