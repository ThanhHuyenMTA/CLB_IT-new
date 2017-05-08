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
        <li class="active">Quản lý loại công việc</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'TypeJobs', 'action' => 'process'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                    <div class="box-header">
                        <h3 class="box-title">
                            <div class="btn-group">
                                <?php echo $this->Html->link(
                                        'Thêm mới',
                                        array('controller' => 'TypeJobs', 'action' => 'add'),
                                        array('class' => 'btn btn-default btn-flat')
                                        );?>
                                <!--<button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>-->
				<button type="button" class="btn btn-default btn-flat action_submit" value="1">Kích hoạt</button>
                                <button type="button" class="btn btn-default btn-flat action_submit" value="2">Tắt</button>
                            </div>
                        </h3>
                        <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                            <h4>Hướng dẫn</h4> 
                            <p>
                                <span><i class="fa fa-check-circle-o"></i> Kích hoạt, </span>
                                <span style="margin-left: 20px;"><i class="fa fa-power-off"></i> Tắt</span>
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
                                    <th width="80">Trạng thái</th>
                                    <th width="120">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($typeJobs as $row):
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
                                            <?php echo $this->Html->link(
                                                    $row['name'],
                                                    array('controller' => 'TypeJobs', 'action' => 'edit', 'id' => $row['id']));?>
                                        </td>
                                        <td align="center">
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