<section class="content-header">
    <h1>
        Quản lý
        <small>Cv</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>',
                array('controller' => 'admin', 'action' => 'index'),
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý Banner</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Banners', 'action' => 'process'], 'id' => 'form_action']);?>
                <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                            <?php echo $this->Html->link(
                                'Thêm mới',
                                array('controller' => 'Banners', 'action' => 'add'),
                                array('class' => 'btn btn-default btn-flat')
                            );?>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Kích hoạt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2" style="min-width: 106px;">Hủy kích hoạt</button>
                            <button type="button" class="btn btn-default  action_submit" value="3">Xóa</button>
                        </div>
                    </h3>
                    <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                        <h4>Hướng dẫn</h4>
                        <p>
                            <span><i class="fa fa-check-circle-o"></i> Đang đăng, </span>
                            <span style="margin-left: 20px;"><i class="fa fa-power-off"></i> Hủy đăng</span>
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
                            <th>Tên banner</th>
                            <td>Title1</td>
                            <th>Title2</th>
                            <th>Title3</th>
                            <th>Preview</th>
                            <th>Order</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($banner as $row):

                            ?>
                            <tr>
                                <td width="50" align="center">
                                    <?php $i++;
                                    echo $this->Html->link($i, array('controller' => 'Banners', 'action' => 'edit', 'id' => $row['id']));
                                    ?>
                                </td>
                                <td width="50" align="center">
                                    <label>
                                        <input class="ids" type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                                    </label>
                                </td>
                                <td width="50" align="center">
                                    <label>
                                        <?php echo
                                        $this->Text->truncate(
                                            $row['name'],
                                            22,
                                            [
                                                'ellipsis' => '...',
                                                'exact' => false
                                            ]
                                        ); ?>
                                    </label>
                                </td>
                                <td>
                                    <?php echo
                                    $this->Text->truncate(
                                        $row['title1'],
                                        22,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false
                                        ]
                                        ); ?>
                                </td>
                                <td>
                                    <?php echo $this->Text->truncate(
                                        $row['title2'],
                                        22,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false
                                        ]
                                    );
                                    ?>
                                </td>
                                <td><?php echo $this->Text->truncate(
                                        $row['title3'],
                                        22,
                                        [
                                            'ellipsis' => '...',
                                            'exact' => false
                                        ]
                                    ); ?></td>
                                <td>
                                    <img src="<?= '../' . $row['url'];?>" alt="Banner" style="max-width: 120px; max-height: 60px;">
                                </td>
                                <td>
                                    <?php echo $this->Form->input('order_sort[]', array(
                                        'type' => 'number',
                                        'div' => false,
                                        'label' => false,
                                        'class' => 'form-control',
                                        'value' => $row['order_sort']
                                    ));?>
                                </td>
                                <td align="center">
                                    <?php if (intval($row['status']) == 1): ?>
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