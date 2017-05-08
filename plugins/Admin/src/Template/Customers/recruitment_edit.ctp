<!-- Content Header (Page header) -->
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
        <li><?php echo $this->Html->link('Quản lý nhà tuyển dụng', array('controller' => 'Customers', 'action' => 'index'));?></li>
        <li class="active"><?php echo $customer['full_name'];?></li>
    </ol>
</section>

<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $user['full_name'];?></h3>
        </div>
        <?php echo $this->Form->create($customer,['class'=>'form-horizontal','type'=>'post']); ?>
          <div class="box-body">
            <?php echo $this->Flash->render(); ?>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Tên đơn vị tuyển dụng<span class="error-message">*</span></label>
                <div class="col-lg-8">
                  <?= $this->Form->input('full_name',['class' => 'form-control', 'label' => false, 'value' => $customer['full_name'],'default' => null]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Tư cách tuyển dụng<span class="error-message"> *</span></label>
                <div class="col-lg-8">
                    <?php echo $this->Form->input('role',
                        ['options'=>$role,'default'=>false,
                        'empty' => '--Danh mục--',
                        'class' => 'form-control',
                        'value' => $customer['role'],
                    'label' => false,
                    ]);?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Email đăng nhập<span class="error-message"> *</span></label>
                <div class="col-lg-8">
                  <?= $this->Form->input('email',['class' => 'form-control', 'label' => false,"type" => "text", 'value' => $customer['username'], 'default' => null]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Mật khẩu</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('password',['class' => 'form-control', 'label' => false,"type" => "password", "value" => false]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Xác nhận mật khẩu</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('confirm_password',['class' => 'form-control', 'label' => false, "type" => "password"]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Địa chỉ</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('address',['class' => 'form-control', 'label' => false, 'value' => $customer['address']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Người liên hệ</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('personal_name',['class' => 'form-control', 'label' => false, 'value' => $customer['personal_name']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Số điện thoại công ty</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('mobile',['class' => 'form-control', 'label' => false, 'value' => $customer['mobile']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Số điện thoại liên hệ</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('personal_phone',['class' => 'form-control', 'label' => false, 'value' => $customer['personal_phone']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Email liên hệ</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('personal_email',['class' => 'form-control', 'label' => false, 'value' => $customer['personal_email']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Website</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('company_website',['class' => 'form-control', 'label' => false, 'value' => $customer['company_website']]) ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Giới thiệu về đơn vị tuyển dụng</label>
                <div class="col-lg-8">
                  <?= $this->Form->input('company_description',['type' => 'textarea','class' => 'form-control', 'label' => false, 'value' => $customer['company_description']]) ?>
                </div>
              </div>
              <?php /*
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Hình ảnh công ty</label>
                <div class="col-lg-8 text-center" style="margin-left: 16px;">
                  <!-- <div class=""> -->
                     <?php if($customer->avatart){
                          echo $this->Html->image($this->request->webroot . $customer->avatart);
                      } ?>
                  <!-- </div> -->
                  <div class="form-group">
                    <div class="btn btn-default image-preview-input user_employee_profile_input_change" style="margin-top:20px">
                       <span class="glyphicon glyphicon-folder-open"></span>
                       <span class="image-preview-input-title">Chọn ảnh khác</span>
                       <input name="avatar" type="file" id="exampleInputFile" class = "btn btn-default image-preview-input user_employee_profile_input_change">
                    </div>
                  </div>
              </div>
            </div>
            */ ?>
            <div class="form-group">
              <label for="inputTitle" class="col-lg-2 control-label">Trạng thái</label>
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
              <label for="inputTitle" class="col-lg-2 control-label">Xóa</label>
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
            <div class="form-group text-center" style="margin-top: 2em">
                <?php echo $this->Html->link(
                            'Quay lại', 
                            array(
                                'controller' => 'customers',
                                'action' => 'recruitment'
                            ),
                            array(
                                'class' => 'btn btn-default'
                            )); ?>
                <button type="submit" class="btn btn-primary" formnovalidate="true">Lưu</button>      
            </div>
          </div>
        <?= $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
    .error-message{
        color: red;
    }

</style>