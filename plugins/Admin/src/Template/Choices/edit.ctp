<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Cv được chon</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Cv được chon', array('controller' => 'Choices', 'action' => 'index'));?></li>
        <li class="active">Cv được chon</li>
    </ol>
</section>

<div class="container">
  <?= $this->Form->create($choice,['class'=>'form-horizontal', 'id'=>'formPostJob','type'=>'file']); ?>
    <fieldset>
      <legend>Cập nhật CV</legend>
        <?php echo $this->Flash->render(); ?>
        <div class="form-group">
            <label for="inputTitle" class="col-lg-2 control-label">CV<span class="error-message"> *</span></label>
            <div class="col-lg-10">
             <?php echo $this->Form->input('cv_id', array(
                'options' => $listCvs,                
                'empty' => '--Chọn nhà tuyển dụng--',
                'label' => false,
                'class' => 'form-control',
                'value' => $choice['cv_id']
                    )); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-lg-2 control-label">Nhà tuyển dụng<span class="error-message"> *</span></label>
            <div class="col-lg-10">
              <?php echo $this->Form->input('recruitment_id', array(
                'options' => $recruitments,            
                'empty' => '--Chọn nhà tuyển dụng--',
                'label' => false,
                'class' => 'form-control',
                'value' => $choice['recruitment_id']                
                    )); ?>
            </div>
        </div>        
        <div class="form-group">
            <label for="inputTitle" class="col-lg-2 control-label">View<span class="error-message"> *</span></label>
            <div class="col-lg-10">
              <?php 
                    $isView = $choice['is_view'] ? true : false;
                    echo $this->Form->input('is_view', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => $isView,
                    'style' => '-webkit-appearance: checkbox;',
                    ));

                     ?>
            </div>
        </div> 
        <div class="form-group">
            <label for="inputTitle" class="col-lg-2 control-label">Nhà tuyển dụng<span class="error-message"> *</span></label>
            <div class="col-lg-10">
              <?php 
                    $isActive = $choice['status'] ? true : false;
                    echo $this->Form->input('status', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => $isActive,
                    'style' => '-webkit-appearance: checkbox;'
                    )); ?>
            </div>
        </div> 
        <div class="form-group">
          <div class="col-lg-12" style="  text-align:center;">
            <?php echo $this->Html->link(
                        'Hủy', 
                        array(
                            'controller' => 'Choices',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'btn btn-default',
                            'style' => 'margin-left:45%'
                        ));?>
            <?= $this->Form->button('Thêm', ['class'=>'btn btn-primary','style' => 'margin-right:45%' ,'type' => 'submit','formnovalidate' => true]);  ?>
          </div>
        </div>
    </fieldset>
    <?= $this->Form->end(); ?>
</div>