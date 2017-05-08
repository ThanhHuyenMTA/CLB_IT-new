<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Loại công việc</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý loại công việc', array('controller' => 'TypeJobs', 'action' => 'index'));?></li>
        <li class="active"><?php echo $typeJob['name'];?></li>
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
                    <h3 class="box-title"><?php echo $typeJob['name'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create('', array('class' => 'form-horizontal'));
                echo '<div class="box-body">';
                echo $this->Flash->render();

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên</label>';
                echo $this->Form->input('TypeJob.name', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'value' => $typeJob['name']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Trạng thái</label>';
                $isActive = $typeJob['status']? true: false;
                echo $this->Form->input('TypeJob.status', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'checkbox',
                    'checked' => $isActive,
                    'style' => '-webkit-appearance: checkbox;',
                    'value' => 1
                    ));
                echo '</div>';

                echo '<div class="box-footer">';
                echo $this->Html->link(
                        'Hủy', 
                        array(
                            'controller' => 'TypeJobs',
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