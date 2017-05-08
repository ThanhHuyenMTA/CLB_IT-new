<!-- Content Header (Page header) -->
<?php echo $this->Html->script("app/common") ?>
<section class="content-header">
    <h1>
        Quản lý
        <small>Công việc</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Công việc', array('controller' => 'Jobs', 'action' => 'index'));?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>

<div class="container">
  <?= $this->Form->create($job,['class'=>'form-horizontal', 'id'=>'formPostJob','type'=>'file']); ?>
    <fieldset>
      <legend>Thêm công việc</legend>
        <?php echo $this->Flash->render(); ?>
      <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Tiêu đề<span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('title',['class' => 'form-control', 'id' => 'inputTitle', 'label' => false]) ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputTitle" class="col-lg-2 control-label">Danh mục công việc<span class="error-message"> *</span></label>
            <div class="col-md-6">
                <?php echo $this->Form->input('category_id',['options'=>$categories,'default'=>false,'empty' => '--Danh mục--','class' => 'form-control','label' => false]);?>
            </div> 
      </div>
      <div class="form-group">
          <label  for="inputTitle" class="col-lg-2 control-label">Nhà tuyển dụng</label>
          <div class="col-md-6">
              <?php echo $this->Form->input('recruitment_id', array(
                'options' => $recruitments,                
                'empty' => '--Chọn nhà tuyển dụng--',
                'label' => false,
                'class' => 'form-control'
                    )); ?>
          </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Địa chỉ<span class="error-message"> *</span></label>
        <div class="col-lg-4">
          <?= $this->Form->input('place_work',['class' => 'form-control', 'id' => 'inputPlaceWork', 'placeholder' => 'Địa chỉ', 'label' => false]) ?>
        </div>
        <div class="col-lg-3">
          <?= $this->Form->input(
              'province_id',
              ['options'=>$cities,'empty' => '--Tỉnh/Tp--', 'class' => 'form-control', 'id' => 'province_id','label'=>false]
          );?>
        </div>
        <div class="col-lg-3">
          <?= $this->Form->input(
              'district_id',
              ['options'=>$districts,'empty' => '--Quận huyện--', 'class' => 'form-control', 'id' => 'district_id','label'=>false]
          );?>
        </div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Nội dung công việc<span class="error-message"> *</span></label>
        <div class="col-lg-10">
          <?= $this->Form->input('description',['class' => 'form-control', 'id' => 'inputDescription', 'placeholder' => 'Miêu tả công việc', 'label' => false,'rows' => 3]) ?>
        </div>
      </div>      
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Yêu cầu</label>
        <div class="col-lg-10">
          <?= $this->Form->input('require_work',['class' => 'form-control', 'id' => 'inputRequireWork', 'placeholder' => 'Yêu cầu', 'label' => false,'rows' => 5]) ?>
        </div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Mức lương<span class="error-message"> *</span></label>
        <div class="col-lg-4">
          <?= $this->Form->input('salary',['class' => 'form-control', 'id' => 'inputSalary', 'placeholder' => 'Nhập số tiền', 'label' => false]) ?>
          <span class="text1" style="float:left;">/</span>
          <?= $this->Form->input(
              'unit',
              ['options' => $listUnit,
              'empty' => '--Chọn thời gian--', 'class' => 'form-control', 'id' => 'inputUnit','label' => false]
          );?>
        </div>
      </div>
      <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Thời gian</label>
            <div style="display: inline-block;float: left;line-height: 35px;text-indent: 16px;"><span>Bắt đầu</span></div>
            <div class="col-lg-2" style="padding-left:8px;">
              <div class="input-group date" data-provide="datepicker">
                  <?= $this->Form->input('time_start_apply',['class'=>'form-control', 'label' => false,'type'=>'text']);  ?>
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
            </div>
            <div style="display: inline-block;float: left;line-height: 35px;text-indent: 5px;"><span>Hết hạn</span></div>
            <div class="col-lg-2" style="padding-left:8px;">
              <div class="input-group date" data-provide="datepicker">
                  <?= $this->Form->input('time_expire_apply',['class'=>'form-control', 'label' => false,'type'=>'text']);  ?>
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
            </div>
        </div>
        <?php echo $this->Form->hidden("Job.time_start_apply",array("label" => false)) ?>
        <?php echo $this->Form->hidden("Job.time_expire_apply",array("label" => false)) ?>

      <div class="form-group">
          <div for="experience" class="col-lg-2 control-label" style="font-weight: bold;">Kinh nghiệm<span class="required" aria-required="true"> *</span></div>
          <div class="col-lg-10">
              <label class="radio-style">
                  <input type="radio" value="0" name='experience' checked>
                
                  <span>không kinh nghiệm</span>
              </label>
              <label class="radio-style">
                  <input type="radio" value="1" name='experience' >
                 
                  <span>Có kinh nghiệm</span>
              </label>                
          </div>
      </div>

      <div class="form-group">
        <label for="timework" class="col-lg-2 control-label">Thời gian làm việc<span class="required" aria-required="true"> *</span></label>
        <div class="col-lg-10">
            <label class="radio-style">
                <input type="radio" value="0" name='timework' checked>
               
                <span>Bán thời gian</span>
            </label>
            <label class="radio-style">
                <input type="radio" value="1" name='timework' >
                
                <span>Toàn thời gian</span>
            </label>
            
        </div>
      </div>

      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Người liên hệ</label>
        <div class="col-lg-3">
          <?= $this->Form->input('contact_person',['class' => 'form-control', 'id' => 'inputcontactperson', 'label' => false]) ?>
        </div>
      </div>
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Số điện thoại</label>
        <div class="col-lg-3">
          <?= $this->Form->input('contact_mobile',['class' => 'form-control', 'id' => 'inputcontactmobile', 'label' => false]) ?>
        </div>
      </div>           
      <div class="form-group">
        <label for="textArea" class="col-lg-2 control-label">Hình ảnh công ty</label>
        <div class="col-lg-3" style="margin-left: 16px;">
            <div class="form-group">
              <input name="avatar" type="file" id="exampleInputFile">
            </div>
        </div>
      </div>      
        <div class="form-group">
          <div class="col-lg-12" style="  text-align:center;">
            <?= $this->Form->button('Hủy', ['class'=>'btn btn-default', 'type' => 'reset']);  ?>
            <?= $this->Form->button('Thêm', ['class'=>'btn btn-primary', 'type' => 'submit','formnovalidate' => true]);  ?>
          </div>
        </div>
    </fieldset>
    <?= $this->Form->end(); ?>
</div>
<?php echo $this->Html->script('Admin.moment-with-locales.js');?>
<?php echo $this->Html->script('Admin.bootstrap-datetimepicker.js');?>
<?php echo $this->Html->css('Admin.bootstrap-datetimepicker.css');?>
<?php echo $this->Html->css('Admin.select2.css');?>
<?php echo $this->Html->css('Admin.select2-bootstrap.css');?>
<?php echo $this->Html->script('Admin.select2.min.js');?>

<script type="text/javascript">
    $(function () {
        $('#time-start-apply').datetimepicker({

            format: "DD/MM/YYYY",
            locale: 'vi_VN'
        });
  
        $('#time-expire-apply').datetimepicker({
            format: "DD/MM/YYYY",
            locale: 'vi_VN'

        });


        $('#time-start-apply').on("dp.change",function(){
            // alert($('#time-start-apply').data('date'));
            var value = $('#time-start-apply').data('date');
            $('#job-time-start-apply').val(value);
            console.log(value);
        });
        
        $('#time-expire-apply').on("dp.change",function(){
            var value = $('#time-expire-apply').data('date');
            $('#job-time-expire-apply').val(value);
            console.log(value);
        });
      });
</script>



<style type="text/css">
    .error-message{
        color: red;
    }

</style>