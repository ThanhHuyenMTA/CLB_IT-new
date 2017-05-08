<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Xin việc của '<?php echo $job['title'];?>'</small>
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
        <li><?php echo $this->Html->link('Quản lý xin việc của ' . $job['title'], array('controller' => 'ApplyJobs', 'action' => 'index', 'job_id' => $job['id']));?></li>
        <li class="active"><?php echo $job['title'];?></li>
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
                    <h3 class="box-title">Chỉnh sửa xin việc của '<?php echo $job['title'];?>'</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create('', array('class' => 'form-horizontal'));
                echo '<div class="box-body">';
                echo $this->Flash->render();

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Cv</label>';
                echo $this->Form->input('Apply.cv_id', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'select',
                    'options' => $listCvs,
                    'required' => true,
                    'value' => $apply['cv_id']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Nhà tuyển dụng</label>';
                echo $this->Form->input('Apply.recruitment_id', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'select',
                    'options' => array(
                        $job['id'] => $job['title']
                    ),
                    'required' => true,
                    'value' => $apply['job_id']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Trạng thái</label>';
                $isActive = $apply['status'] ? true : false;
                echo $this->Form->input('Apply.status', array(
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

                echo '<div class="box-footer">';
                echo $this->Html->link(
                        'Hủy', 
                        array(
                            'controller' => 'Applies',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'btn btn-default'
                        ));
                echo '<button type="submit" class="btn btn-info pull-right">Lưu</button>';
                echo '</div>';

                echo $this->Form->end()
                ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->