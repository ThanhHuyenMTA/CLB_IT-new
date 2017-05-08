<?php
/*
 * Description of Setting
 * @author Nghiep
 * @date Oct 27, 2016
*/
?>
<!-- \src\Template\Settings\add.ctp -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Cài đặt chung</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>',
                array('controller' => 'admin', 'action' => 'index'),
                array('escape' => false)); ?>
        </li>
        <li><?php echo $this->Html->link('Cài đặt chung', array('controller' => 'Settings', 'action' => 'index')); ?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>

<!-- Main content -->
<div class="content">
	<div class="row">
	    <div class="col-md-12">
	        <!-- Horizontal Form -->
	        <div class="box box-info">
		        <div class="box-header with-border">
		            <h3 class="box-title">Thêm mới cài đặt</h3>
		        </div><!-- /.box-header -->
		            <?= $this->Flash->render() ?>
	        <!-- form start -->
	        <?php echo $this->Form->create($setting, array(
	            'type' => 'post',
	            'class' => 'form-horizontal',
	            'id' => 'form-addSettings'
	        	)); ?>
			    <div class="box-body">
			        <div class='cv-information' style="margin-top: 20px;">
			            <div class='cv-information-left col-md-12'>
			                <div class="form-group">
			                    <label for="name" class="col-md-2 control-label">Name<span class="required"> *</span></label>
			                    <div class="col-md-8">
			                        <?= $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'id' => 'name']) ?>
			                    </div>
			                </div>
			                
			                <div class="form-group">
			                    <label for="value" class="col-md-2 control-label">Value<span class="required"> *</span></label>
			                    <div class="col-md-8">
			                        <?= $this->Form->input('value', ['label' => false,'rows' => 1, 'class' => 'form-control', 'id' => 'value']) ?>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="other" class="col-md-2 control-label">Other</label>
			                    <div class="col-md-8">
			                        <?= $this->Form->input('other', ['label' => false, 'class' => 'form-control', 'id' => 'other']) ?>
			                    </div>
			                </div>
				        </div>
			        </div>
			        <div class="submit-add-Setting text-center">
			            <?= $this->Html->Link('Hủy',['action' => 'index'], ['class'=>'btn btn-default']);  ?>
			            <?= $this->Form->button('Lưu', ['class'=>'btn btn-primary', 'type' => 'submit','formnovalidate' => true]);  ?>
			        </div>
		        </div>
	        </div>
	        <?php $this->Form->end(); ?>
	    </div><!--/.col (right) -->
	</div><!-- /.container -->
</div><!-- /.container -->