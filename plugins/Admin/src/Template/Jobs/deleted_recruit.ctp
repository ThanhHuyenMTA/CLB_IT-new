<?php echo $this->Html->css(["Admin.jobs-manager"])?>
<section class="content-header">
    <h1>
        Quản lý
        <small>Công việc | Các tin đã xóa</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý Công việc</li>
    </ol>
</section>

<!-- Main content -->
<section class="content jobs-manager">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Jobs', 'action' => 'process'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                    <div class="box-header">
                        <h3 class="box-title">
                            <div class="links-group">
                                <?= $this->Html->link("Danh sách tin ngừng tuyển", ["controller" => "jobs", "action" => "stoped_recruit"], ["class" => "pull-right btn btn-default"]) ?>
                                <?= $this->Html->link("Quay lại", ["controller" => "jobs", "action" => "index"], ["class" => "pull-right btn btn-default"]) ?>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-flat action_submit" value="7">Khôi phục</button>
                                <button type="button" class="btn btn-default btn-flat " value="8" id = "button_delete">Xóa vĩnh viễn</button>
                            </div>
                        </h3>
                        <div class="bs-callout bs-callout-info" id="callout-alerts-no-default">
                            <h4>Hướng dẫn</h4> 
                            <p><span><i class="fa fa-hdd-o"></i> Tin đã xóa</span></p>
                            <p><span>[Khôi phục] </span>Tạo ra tin mới với nội dung tương tự và trạng thái chưa kích hoạt</p> 
                        </div>
                        <input type="hidden" name="name_action">
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table  id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr style=" font-weight: bold;">
                                    <td align="center">STT</td>
                                    <td align="center">
                                        <label>
                                            <input type="checkbox" id="check_all">
                                        </label>
                                    </td>
                                    <td>Nhà tuyển dụng</td>
                                    <td>Tiêu đề</td>
                                    <td>Địa chỉ</td>
                                    <td>Lương</td>
                                    <td>Trạng thái</td>
                                    <td>Ngày tạo</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($jobs as $row): ?>
                                    <?php $i++; ?>
                                    <tr>
                                        <td width="50" align="center">
                                            <?php echo $i; ?>
                                        </td>
                                        <td width="50" align="center">
                                            <label>
                                                <input class="ids" type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
                                            </label>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link(
                                                $this->Text->truncate(
                                                $row['recruitment']['full_name'],
                                                 22,
                                                [
                                                    'ellipsis' => '...',
                                                    'exact' => false
                                                ]), 
                                                array(
                                                    'controller' => 'Customers',
                                                    'action' => 'edit',
                                                    'id' => $row['recruitment']['id']
                                                ),
                                                array(
                                                    'target' => '_blank'
                                            ));?>
                                        </td>
                                        <td>
                                            <?php
                                            $title =  $this->Text->truncate(
                                                        $row['title'],
                                                        22,
                                                        [
                                                            'ellipsis' => '...',
                                                            'exact' => false
                                                        ]
                                                    );   
                                            echo $this->Html->link(
                                                   $title,
                                                array(
                                                    'controller' => 'Jobs', 
                                                    'action' => 'edit', 
                                                    'id' => $row['id']),
                                                array(
                                                    'target' => '_blank'
                                            ));?>
                                        </td>
                                        <td><?php echo $row['place_work']; ?></td>
                                        <td>
                                            <?php 
                                            switch ($row['unit']){
                                                case 1:
                                                    echo $row['salary'] . '/ Giờ'; 
                                                    break;
                                                case 2:
                                                    echo $row['salary'] . '/ Ngày'; 
                                                    break;
                                                case 3:
                                                    echo $row['salary'] . '/ Tháng'; 
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php if ($row['deleted'] == 1): ?>
                                                <i class="fa fa-hdd-o"><span class="hidden"><?= $row['status']?></span></i>
                                            <?php endif; ?>
                                        <!-- </td> -->
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
        /*width: 82px;*/
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