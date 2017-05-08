<!-- Content Header (Page header) -->
<?php echo $this->Html->css('Admin.select2.css');?>
<?php echo $this->Html->css('Admin.select2-bootstrap.css');?>
<?php echo $this->Html->script('Admin.select2.min.js');?>
<section class="content-header">
    <h1>
        Quản lý
        <small>Nhà tuyển dụng</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý nhà tuyển dụng', array('controller' => 'Customers', 'action' => 'recruitment'));?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>

<!-- Main content -->
<div class="container">
  <?= $this->Form->create($customer,['class'=>'form-horizontal', 'id'=>'formPostCustomer','type'=>'file']); ?>
    <fieldset>
      <legend>Thêm nhà tuyển dụng</legend>
        <?php echo $this->Flash->render(); ?>
      <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Họ và tên <span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('full_name',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false]) ?>
        </div>
      </div>
       <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Tư cách <span class="error-message"> *</span></label>
        <div class="col-lg-10">
            <?php echo $this->Form->input('role',
                ['options'=>$role,'default'=>false,
                'empty' => '--Danh mục--',
                'class' => 'form-control',
            'label' => false]);?>
        </div>
      </div>
        <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Email <span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('email',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false,"type" => "text"]) ?>
        </div>
      </div>
       <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Mật khẩu <span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('password',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false,"type" => "password"]) ?>
        </div>
      </div>
       <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Xác nhận mật khẩu <span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('confirm_password',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false, "type" => "password"]) ?>
        </div>
      </div>
       <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Số điện thoại <span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('mobile',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false]) ?>
        </div>
      </div>
       <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Trạng thái</label>
        <div class="col-lg-10">
          <?= $this->Form->input("status", array(
                "label" => false,
                "class" => 'form-control',
                "type" => 'checkbox',
                'style' => '-webkit-appearance: checkbox'
            )
          ) ?>
        </div>
        <div class="form-group">           
            <button type="submit" class="btn btn-info pull-right" style = "margin-right:45%; margin-top:30px;" formnovalidate="true">Lưu</button>      
        </div>
    </fieldset>
    <?= $this->Form->end(); ?>
</div>

<style type="text/css">
    .error-message{
        color: red;
    }

</style>