<section class="content-header">
    <h1>
        Quản lý
        <small>Nhà tuyển dụng</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý nhà tuyển dụng</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Customers', 'action' => 'recruitmentProcess'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                <div class="box-header">
                    <h3 class="box-title">
                        <div class="btn-group">
                                <?php echo $this->Html->link(
                                        'Thêm mới',
                                        array('controller' => 'Customers', 'action' => 'recruitmentAdd'),
                                        array('class' => 'btn btn-default btn-flat')
                                        );?>
                            <!--<button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>-->
                            <button type="button" class="btn btn-default btn-flat action_submit" value="1">Kích hoạt</button>
                            <button type="button" class="btn btn-default btn-flat action_submit" value="2">Tắt</button>
                            <button type="button" class="btn btn-default btn-flat" id = "button_delete" value="3">Xóa</button>
                        </div>
                    </h3>
                    <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                        <h4>Hướng dẫn</h4> 
                        <p>
                            <span><i class="fa fa-check-circle-o"></i> Đang hoạt động, </span>
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
                                <th>Loại</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Công việc</th>
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
                                            echo 'Công ty';
                                        }elseif($row['role'] == 5){
                                            echo 'Cá nhân';
                                        }
                                    ?>
                                </td>
                                <td>
                                            <?php echo $this->Html->link(
                                                     $this->Text->truncate(
                                                $row['full_name'],
                                                22,
                                                 [
                                                            'ellipsis' => '...',
                                                            'exact' => false
                                                        ]
                                                ),
                                                    array('controller' => 'Customers', 'action' => 'recruitmentEdit', 'id' => $row['id']));?>
                                </td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td>
                                    <?php 
                                        $job = isset($row['jobs']) ? count($row['jobs']) : 0;
                                        echo $this->Html->link(
                                                'Công việc (' . $job . ')',
                                                array(
                                                    'controller' => 'Jobs',
                                                    'action' => 'index',
                                                    'recruitment_id' => $row['id']
                                                )); 
                                    ?>
                                </td>
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

    $('#deletePopupClose').click(function(){
        myModal.style.display = 'none';
         $('.ids').each(function () {
                this.checked = false;
            });
        $('#check_all').prop("checked",false);

    });    
</script>