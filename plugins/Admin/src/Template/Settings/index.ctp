<?php
/*
 * Description of Setting
 * @author Nghiep
 * @date Oct 27, 2016
*/
?>
<!-- \src\Template\Settings\index.ctp -->
<section class="content-header">
    <h1>
        Quản lý
        <small>Cài đặt chung</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>',
                array('controller' => 'admin', 'action' => 'index'),
                array('escape' => false));?>
        </li>
        <li class="active">Cài đặt chung</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Settings', 'action' => 'process'], 'id' => 'form_action']);?>
                <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                            <?php
                                echo $this->Html->link(
                                'Thêm mới',
                                array('controller' => 'Settings', 'action' => 'add'),
                                array('class' => 'btn btn-default btn-flat')
                            );
                            ?>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Kích hoạt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2">Tắt</button>
                            <button type="button" class="btn btn-default btn-flat" id="button_delete" value="3">Xóa</button>
                        </div>
                    </h3>
                    <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                        <h4>Hướng dẫn</h4>
                        <p>
                            <span>name = "chứcnăng_thuộctính"</span>
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
                            <th>Name</th>
                            <th>Value</th>
                            <th>Other</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Modified</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach ($settings as $setting): 
                        ?>
                            <tr>
                                <td align="center">
                                    <?php $i++;
                                    echo $this->Html->link($i, array('controller' => 'Settings', 'action' => 'edit', 'id' => $setting['id']));
                                    ?>
                                </td>
                                <td align="center">
                                    <label>
                                        <input class="ids" type="checkbox" name="ids[]" value="<?php echo $setting['id']; ?>">
                                    </label>
                                </td>
                                <td><?php echo $this->Html->link($setting['name'], array('controller' => 'Settings', 'action' => 'edit', 'id' => $setting['id'])); ?></td>
                                <td><?php echo $this->Text->truncate($setting['value'], 40, ['ellipsis' => '...', 'exact' => false]); ?></td>
                                <td><?php echo $this->Text->truncate($setting['other'], 40, ['ellipsis' => '...', 'exact' => false]); ?></td>
                                <td align="center"><span class="hidden"><?= $setting['status']?></span>
                                    <?php if ($setting['status']): ?>
                                        <i class="fa fa-check-circle-o"></i>
                                    <?php else: ?>
                                        <i class="fa fa-power-off"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $setting['created']; ?></td>
                                <td><?php echo $setting['modified']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <?php echo $this->Form->end();?>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.setting -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content" style="width: 20%;position: relative;bottom: 2px;left: 0;right: 0;margin-left: 40%;margin-top: 10%;">
        <div class="modal-header">
          <h2>Bạn có muốn xóa không ?</h2>
        </div>
        <div class="modal-footer">
          <button id = "deletePopupYes">Có</button>
          <button id = "deletePopupClose">Không</button>
        </div>
      </div>
    </div>
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
    var myModal = document.getElementById('myModal');


    $('#button_delete').click(function(){

        myModal.style.display = 'block';

    }); 

    $('#deletePopupYes').click(function(){
       myModal.style.display = 'none';
        var value = $('#button_delete').val();
        $('input[name=name_action]').val(value);
        $('#form_action').submit();
        $('#check_all').prop("checked",false);
    });
</script>