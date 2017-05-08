<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Liên hệ</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Liên hệ', array('controller' => 'Contacts', 'action' => 'index'));?></li>
        <li class="active"><?php echo $contact['name_user'];?></li>
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
                    <h3 class="box-title"><?php echo $contact['name_user'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create('', array('class' => 'form-horizontal'));
                echo '<div class="box-body">';
                echo $this->Flash->render();

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Tên</label>';
                echo $this->Form->input('Contact.full_name', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'readonly' => true,
                    'value' => $contact['name_user']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Email</label>';
                echo $this->Form->input('Contact.email_user', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'readonly' => true,
                    'value' => $contact['email_user']
                    ));
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">Nội dung</label>';
                echo $this->Form->input('Contact.content', array(
                    'label' => false,
                    'templates' => [
                        'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                    ],
                    'class' => 'form-control',
                    'type'=>'textarea',
                    'readonly' => true,
                    'value' => $contact['content']
                    ));
                echo '</div>';

                echo '<div class="box-footer">';
                echo $this->Html->link(
                        'Quay lại', 
                        array(
                            'controller' => 'Contacts',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'btn btn-default'
                        ));
                echo $this->Html->link(
                        'Trả lời', 
                        array(
                            'controller' => 'Contacts',
                            'action' => 'reply',
                            'id' => $contact['id']
                        ),
                        array(
                            'class' => 'btn btn-info pull-right'
                        ));
                echo '</div>';

                echo $this->Form->end()
                ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->