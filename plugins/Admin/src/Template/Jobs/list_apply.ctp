<section class="content-header">
    <h1>
        Quản lý
        <small>Danh sách úng tuyển</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <?php 
            echo $this->Html->link(
                '<i class="fa fa-dashboard"></i> Trang chủ</a>', 
                array('controller' => 'admin', 'action' => 'index'), 
                array('escape' => false));?>
        </li>
        <li class="active">Quản lý danh sách ứng tuyển</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php echo $this->Form->create(null,['url' => ['controller' => 'Jobs', 'action' => 'process'], 'id' => 'form_action']);?>
                    <?php echo $this->Flash->render();?>
                    <div class="box-header">
                        <h3>
                            <?php echo $jobs['title']; ?>
                        </h3>
                        <h3 class="box-title">
                            <div class="btn-group">
                                <?php echo $this->Html->link(
                                        'Thêm mới',
                                        array('controller' => 'Jobs', 'action' => 'add'),
                                        array('class' => 'btn btn-default btn-flat')
                                        );?>
                                <!--<button type="button" class="btn btn-default btn-flat action_submit" value="4">Cập nhật</button>-->
                                <!-- <button type="button" class="btn btn-default btn-flat action_submit" value="2">Hủy đăng</button> -->
                                <button type="button" class="btn btn-default btn-flat " value="3" id = "button_delete">Xóa</button>
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
                                <tr style=" font-weight: bold;">
                                    <td align="center">STT</td>
                                    <td align="center">
                                        <label>
                                            <input type="checkbox" id="check_all">
                                        </label>
                                    </td>
                                    <td>Tên CV</td>
                                    <td>Tên Ứng viên</td>
                                    <td>Email ứng viên</td>
                                    <td>Ngày ứng tuyển</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $i = ($this->Paginator->current() - 1) * $number_per_page;
                                foreach ($cvs as $cv):
                                    ?>
                                    <tr>
                                        <td width="50" align="center">
                                            <?php /* $i++;
                                            echo $i;*/ ?>
                                        </td>
                                        <td width="50" align="center">
                                            <label>
                                                <input class="ids" type="checkbox" name="ids[]" value="<?php echo $cv['id']; ?>">
                                            </label>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link(
                                                       $this->Text->truncate(
                                                         $cv['name'],
                                                         22,
                                                         [
                                                                'ellipsis' => '...',
                                                                'exact' => false
                                                            ]
                                                        ), 
                                                    array(
                                                        'controller' => 'Cvs',
                                                        'action' => 'edit',
                                                        'id' => $cv['id']
                                                    ),
                                                    array(
                                                        'target' => '_blank'
                                                    ));?>
                                        </td>
                                        <td>
                                            <?php 
                                             echo $this->Html->link(
                                                    $this->Text->truncate($cv['customer_full_name'],22,['ellipsis' => '...','exact' => false]),
                                                    array(
                                                        'controller' => 'Customers', 
                                                        'action' => 'employeeEdit', 
                                                        'id' => $cv['employee_id']),
                                                    array(
                                                        'target' => '_blank'
                                                    ));?>
                                        </td>
                                        <td>
                                            <?php echo $cv['customer_email']; ?>
                                        </td>
                                        <td><?php echo $cv['created']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                <?php echo $this->Form->end();?>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.cv -->
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

    $('#deletePopupClose').click(function(){
        myModal.style.display = 'none';
        $('.ids').each(function () {
            this.checked = false;
        });
        $('#check_all').prop("checked",false);
    });    
</script>