<!-- Content Header (Page header) -->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2-bootstrap.css">
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
        <li><?php echo $this->Html->link('Quản lý ứng viên', array('controller' => 'Customers', 'action' => 'employee'));?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>

<div class="container">
  <?= $this->Form->create($customer,['class'=>'form-horizontal', 'type'=>'file']); ?>
    <fieldset>
      <legend>Thêm ứng viên</legend>
        <?php echo $this->Flash->render(); ?>
      <div class="form-group">
        <label for="inputFullName" class="col-lg-2 control-label">Tên <span class="error-message">*</span></label>
        <div class="col-sm-8">
          <?= $this->Form->input('full_name',['class' => 'form-control', 'id' => 'inputFullName', 'label' => false, 'placeholder' => 'Tên sẽ hiển thị trên website khi đăng nhập.']); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email <span class="error-message">*</span></label>
        <div class="col-sm-8">
          <?= $this->Form->input('email',['class' => 'form-control', 'id' => 'inputEmail', 'label' => false, 'placeholder' => 'Email sử dụng để đăng nhập.']); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Mật khẩu <span class="error-message">*</span></label>
        <div class="col-sm-8">
          <?= $this->Form->input('password',['class' => 'form-control', 'id' => 'inputPassword', 'label' => false, 'placeholder' => 'Mật khẩu']); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputConfirmPassword" class="col-lg-2 control-label">Xác nhận mật khẩu <span class="error-message">*</span></label>
        <div class="col-sm-8">
          <?= $this->Form->input('confirm_password',['type' => 'password', 'class' => 'form-control', 'id' => 'inputConfirmPassword','required', 'label' => false, 'placeholder' => 'Nhập lại mật khẩu']); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputMobile" class="col-lg-2 control-label">Số điện thoại <span class="error-message">*</span></label>
        <div class="col-sm-8">
          <?= $this->Form->input('mobile',['type' => 'number' ,'class' => 'form-control', 'id' => 'inputMobile', 'label' => false, 'placeholder' => 'Số điện thoại']); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputStatus" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-8">
          <?= $this->Form->input('status', array(
                    'label' => false,
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => true,
                    'style' => '-webkit-appearance: checkbox;'
                    )); ?>
        </div>
        <div class="form-group"></div>
      </div>
        <div class="form-group">
          <div class="col-sm-12" style="  text-align:center;">
            <?= $this->Form->button('Hủy', ['class'=>'btn btn-default', 'type' => 'reset']);  ?>
            <?= $this->Form->button('Thêm', ['class'=>'btn btn-primary', 'type' => 'submit','formnovalidate' => true]);  ?>
          </div>
        </div>
    </fieldset>
    <?= $this->Form->end(); ?>
</div>