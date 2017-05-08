<section class="content-header">
    <h1>
        Quản lý
        <small>Danh sách quên mật khẩu</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>',
                array('controller' => 'admin', 'action' => 'index'),
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý danh sách quên mật khẩu</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'ForgotPasswords', 'action' => 'process'], 'id' => 'form_action']);?>
                <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                            <?php
                                // echo $this->Html->link(
                                // 'Thêm mới',
                                // array('controller' => 'ForgotPasswords', 'action' => 'add'),
                                // array('class' => 'btn btn-default btn-flat')
                            // );
                            ?>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Bật</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2">Tắt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="3">Xóa</button>
                        </div>
                    </h3>
                    <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                        <h4>Hướng dẫn</h4>
                        <p>
                            <span><i class="fa fa-check-circle-o"></i> Code reset chưa sử dụng </span>
                            <span style="margin-left: 20px;"><i class="fa fa-power-off"></i> Code reset đã sử dụng</span>
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
                            <th>Email</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Thời gian gửi link</th>
                            <th>Thời gian reset mật khẩu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach ($forgot as $row): 
                        ?>
                            <tr>
                                <td align="center">
                                    <?php $i++;
                                    echo $this->Html->link($i, array('controller' => 'ForgotPasswords', 'action' => 'edit', 'id' => $row['id']));
                                    ?>
                                </td>
                                <td align="center">
                                    <label>
                                        <input class="ids" type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                                    </label>
                                </td>
                                <td><?php echo $this->Html->link($row['email'], array('controller' => 'ForgotPasswords', 'action' => 'edit', 'id' => $row['id'])); ?></td>
                                <td><?php echo $row['code']; ?></td>
                                <td align="center"><span class="hidden"><?= $row['status']?></span>
                                    <?php if ($row['status']): ?>
                                        <i class="fa fa-check-circle-o"></i>
                                    <?php else: ?>
                                        <i class="fa fa-power-off"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['created'];?></td>
                                <td><?php echo $row['modified']; ?></td>
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