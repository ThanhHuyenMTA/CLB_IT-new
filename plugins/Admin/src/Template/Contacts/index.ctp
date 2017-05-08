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
        <li class="active">Quản lý Liên hệ</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Contacts', 'action' => 'process'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                                <?php 
//                                echo $this->Html->link(
//                                        'Thêm mới',
//                                        array('controller' => 'Customers', 'action' => 'employeeAdd'),
//                                        array('class' => 'btn btn-default btn-flat')
//                                    );
                                ?>
                            <!--<button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>-->
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Đã xem</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2">Chưa xem</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="3">Xóa</button>
                        </div>
                    </h3>
                    <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                        <h4>Hướng dẫn</h4> 
                        <p>
                            <span><?php echo $this->Html->image('Admin.close_email.png', array('alt' => 'Chưa xem', 'width' => 25, 'height' => 25)) . ' Chưa xem'; ?>, </span>
                            <span style="margin-left: 20px;"><?php echo $this->Html->image('Admin.open_email.png', array('alt' => 'Chưa xem', 'width' => 25, 'height' => 25)) . ' Đã xem'; ?> </span>
                        </p> 
                    </div>
                    <input type="hidden" name="name_action">
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th align="center">STT</th>
                                <th>
                                    <label>
                                        <input type="checkbox" id="check_all">
                                    </label>
                                </th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Trả lời</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 0;
                                foreach ($contacts as $row):
                                    ?>
                            <tr>
                                <td width="50" align="center">
                                            <?php $i++;
                                            echo $i; ?>
                                </td>
                                <td width="50" align="center">
                                    <label>
                                        <input class="ids" type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                                    </label>
                                </td>
                                <td>
                                    <?php 
                                    echo $this->Html->link(
                                            $row['name_user'],
                                            array(
                                                'controller' => 'Contacts',
                                                'action' => 'view',
                                                'id' => $row['id']
                                            )
                                    );
                                    ?>
                                </td>
                                <td><?php echo $row['email_user']; ?></td>
                                <td><?php echo $row['content']; ?></td>
                                <td>
                                    <?php 
                                    echo $this->Html->link(
                                        '<i class="fa fa-reply" aria-hidden="true"></i>',
                                        array('controller' => 'Contacts', 'action' => 'reply', 'id' => $row['id']),
                                        array('escape' => false));
                                    ?>
                                   
                                </td>
                                <td align="center"><span class="hidden"><?= $row['status']?></span>
                                    <?php 
                                    if ($row['status'] == 0){
                                        echo $this->Html->image('Admin.close_email.png', array('alt' => 'Chưa xem', 'width' => 25, 'height' => 25));
                                    }elseif($row['status'] == 1){
                                        echo $this->Html->image('Admin.open_email.png', array('alt' => 'Đã xem', 'width' => 25, 'height' => 25));
                                    }
                                    ?>
                                <td><?php echo $row['created']; ?></td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <?php echo $this->Form->end();?>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<style>
    .box-title .btn-group .btn-flat{
        margin-right: 5px;
        width: 82px;
    } 
</style>
<script>
    $('#check_all').click(function () {
        if (this.checked) {
            $('.ids').each(function () {
                this.checked = true;
            });
        } else {
            $('.ids').each(function () {
                this.checked = false;
            });
        }
    });
    $('.action_submit').click(function () {
        var value = $(this).val();
        $('input[name=name_action]').val(value);
        $('#form_action').submit();
    });
</script>