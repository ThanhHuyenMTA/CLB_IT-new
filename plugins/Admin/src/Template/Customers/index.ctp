<section class="content-header">
    <h1>
        Quản lý
        <small>Khách hàng</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý Khách hàng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Customers', 'action' => 'process'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                                <?php echo $this->Html->link(
                                        'Thêm mới',
                                        array('controller' => 'Customers', 'action' => 'add'),
                                        array('class' => 'btn btn-default btn-flat')
                                        );?>
                            <!--<button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>-->
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Kích hoạt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2">Hủy hoạt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="3">Xóa</button>
                        </div>
                    </h3>
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
                                <th>Role</th>
                                <th>Tên</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $i = 0;
                                foreach ($customers as $row):
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
                                        if ($row['role'] == 3){
                                            echo 'Nhà tuyển dụng';
                                        }elseif($row['role'] == 4){
                                            echo 'Sinh viên';
                                        }
                                    ?>
                                </td>
                                <td>
                                            <?php echo $this->Html->link(
                                                    $row['full_name'],
                                                    array('controller' => 'Customers', 'action' => 'edit', 'id' => $row['id']));?>
                                </td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td align="center"><span class="hidden"><?= $row['status']?></span>
                                            <?php if ($row['status']): ?>
                                    <i class="fa fa-check-circle-o"></i>
                                            <?php else: ?>
                                    <i class="fa fa-power-off"></i>
                                            <?php endif; ?>
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