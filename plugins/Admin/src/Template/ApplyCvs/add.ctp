<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Xin việc của <?php echo $cv['employee']['full_name'];?></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Cv', array('controller' => 'Cvs', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link('Quản lý xin việc của ' . $cv['employee']['full_name'], array('controller' => 'ApplyCvs', 'action' => 'index', 'cv_id' => $cv['id']));?></li>
        <li class="active">Thêm mới</li>
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
                    <h3 class="box-title">Thêm mới 'Xin việc'</h3>
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
                    'options' => array($cv['id'] => $cv['employee']['full_name']),
                    'value' => $cv['id']
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Công việc</label>';
                echo $this->Form->input('Apply.job_id', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'select',
                    'options' => array('' => '--Chọn công việc--') + $jobs,
                    'required' => true
                    ));
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Trạng thái</label>';
                echo $this->Form->input('Apply.status', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => true,
                    'style' => '-webkit-appearance: checkbox;'
                    ));
                echo '</div>';

                echo '<div class="box-footer">';
                //echo '<a href="' . $this->url('category') . '" class="btn btn-default">Hủy</a>';
                echo '<button type="submit" class="btn btn-info pull-right">Thêm mới</button>';
                echo '</div>';

                echo $this->Form->end()
                ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->