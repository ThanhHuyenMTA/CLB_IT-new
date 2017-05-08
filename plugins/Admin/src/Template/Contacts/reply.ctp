<!-- Content Header (Page header) -->
<?php echo $this->Html->css('Admin.contact.css');?>
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
        <li class="active">Trả lời "<?php echo $contact['name_user'];?>"</li>
    </ol>
</section>

<!-- Main content -->
<section class="content contact">
    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Trả lời "<?php echo $contact['name_user'];?>"</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="row box-body">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"> <?php echo $contact['email_user']; ?></span>
                                <div class="btn-group pull-right">
                                    <a href="#"><span class="glyphicon glyphicon-refresh"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <ul class="chat">
                                    <?php foreach ($contact_cl as $contactcl) { ?>
                                        <li class="left clearfix">
                                            <div class="chat-body clearfix">
                                                <div class="header text-right">
                                                    <u class="primary-font"><em><?php echo $contactcl['created']; ?></em></u>
                                                </div>
                                                <p><?php echo nl2br(htmlspecialchars($contactcl['content'])); ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"> Admin</span>
                                <div class="btn-group pull-right">
                                    <a href="#"><span class="glyphicon glyphicon-refresh"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <ul class="chat">
                                    <?php foreach ($contact_ad as $contactad) { ?>
                                        <li class="left clearfix">
                                            <div class="chat-body clearfix">
                                                <div class="header text-right">
                                                    <u class="primary-font"><em><?php echo $contactad['created']; ?></em></u>
                                                </div>
                                                <p><?php echo nl2br(htmlspecialchars($contactad['content'])); ?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->create('', array('class' => 'form-horizontal'));?>
                <div class="box-body">
                    <?php echo $this->Flash->render(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Người nhận</label>
                    <?php echo $this->Form->input('name_user', array(
                        'label' => false,
                        'templates' => [
                            'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                        ],
                        'class' => 'form-control',
                        'value' => $contact['name_user']
                        )); ?>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <?php echo $this->Form->input('email_user', array(
                        'label' => false,
                        'templates' => [
                            'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                        ],
                        'class' => 'form-control',
                        'value' => $contact['email_user']
                        )); ?>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nội dung</label>
                    <?php echo $this->Form->input('content', array(
                        'label' => false,
                        'templates' => [
                            'inputContainer' => '<div class="col-sm-8">{{content}}</div>'
                        ],
                        'class' => 'form-control',
                        'required' => true,
                        'type'=>'textarea',
                        )); ?>
                </div>

                

                <div class="box-footer text-center">
                    <?php echo $this->Html->link(
                            'Quay lại', 
                            array(
                                'controller' => 'Contacts',
                                'action' => 'index'
                            ),
                            array(
                                'class' => 'btn btn-default'
                            )); ?>
                    <button type="submit" class="btn btn-info" formnovalidate = true>Trả lời</button>
                </div>

                <?php echo $this->Form->end(); ?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->