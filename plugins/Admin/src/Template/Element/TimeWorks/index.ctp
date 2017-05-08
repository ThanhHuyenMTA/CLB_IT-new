<!--\src\Template\Element\TimeWorks\index.ctp-->
<?php
    $isAllDay = true;
    $timeserving_from = null;
    $timeserving_to = null;
    if(count($timeWorks)){
        if($timeWorks[0]['day'] == 0){
            $timeserving_from = $timeWorks[0]['timeserving_from'];
            $timeserving_to = $timeWorks[0]['timeserving_to'];
        }else{
            $isAllDay = false;
        }
    }
?>
<div class="form-group">
    <label class="col-sm-2 control-label">Thời gian làm việc</label>
    <div class="col-sm-8">
        <div class="form-group">
            <div class="col-sm-2">
                <input type="checkbox" name="Timework[0][day]" value="0" <?php if($isAllDay) echo 'checked="checked"';?>>Tất cả tuần</div>
            <div class="col-sm-5">
                <div class="input-group date all-time" data-provide="datepicker">
                    <input type="text" name="Timework[0][timeserving_from]" value="<?php if($timeserving_from) echo date('H:i:s', strtotime($timeserving_from));?>" class="form-control init-time" placeholder="Bắt đầu làm việc">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="input-group date all-time" data-provide="datepicker">
                    <input type="text" name="Timework[0][timeserving_to]" value="<?php if($timeserving_from) echo date('H:i:s', strtotime($timeserving_to));?>" class="form-control init-time" placeholder="Kết thúc làm việc">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
        </div>
        <div id="customize-time">
            <div class="form-group" id="add-row-time">
                <button type="button" class="btn btn-info pull-left add btn-flat">Thêm thời gian</button>
                <button type="button" class="btn btn-info pull-left remove btn-flat">Xóa thời gian</button>
            </div>
            <?php if(!$isAllDay):?>
            <?php $row = 0; foreach ($timeWorks as $timeWork): $row++; ?>
            <div class="form-group">
                <div class="col-sm-2">
                    <select name="Timework[<?php echo $row;?>][day]" value="<?php echo $timeWork['day'];?>" class="form-control">
                        <option value="2">Thứ 2</option>
                        <option value="3">Thứ 3</option>
                        <option value="4">Thứ 4</option>
                        <option value="5">Thứ 5</option>
                        <option value="6">Thứ 6</option>
                        <option value="7">Thứ 7</option>
                        <option value="1">Chủ nhật</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="input-group date all-time" data-provide="datepicker">
                        <input type="text" name="Timework[<?php echo $row;?>][timeserving_from]" value="<?php echo date('H:i:s', strtotime($timeWork['timeserving_from']));?>" class="form-control init-time" placeholder="Bắt đầu làm việc">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group date all-time" data-provide="datepicker">
                        <input type="text" name="Timework[<?php echo $row;?>][timeserving_to]" value="<?php echo date('H:i:s', strtotime($timeWork['timeserving_to']));?>" class="form-control init-time" placeholder="Kết thúc làm việc">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info pull-left remove btn-flat">Xóa</button>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
<script>
    var isChecked = '<?php echo $isAllDay;?>';
    var rows = 0;
    $(function(){
        if(!isChecked){
            $('#customize-time')[0].style.display = 'block';
            $('.all-time').each(function(){
                this.style.display = 'none';
            });
        }
        
        $('.init-time').datetimepicker({
            format: 'LT'
        });
        $('input[name="Timework[0][day]"]').click(function(){
            if(this.checked){
                $('#customize-time')[0].style.display = 'none';
                $('.all-time').each(function(){
                    this.style.display = 'block';
                });
            }else{
                $('#customize-time')[0].style.display = 'block';
                $('.all-time').each(function(){
                    this.style.display = 'none';
                });
            }
        });
        $('#add-row-time .add').click(function(){
            rows++;
            var html = '<div class="form-group">\n\
                            <div class="col-sm-2">\n\
                                <select name="Timework[' + rows + '][day]" class="form-control">\n\
                                    <option value="2">Thứ 2</option>\n\
                                    <option value="3">Thứ 3</option>\n\
                                    <option value="4">Thứ 4</option>\n\
                                    <option value="5">Thứ 5</option>\n\
                                    <option value="6">Thứ 6</option>\n\
                                    <option value="7">Thứ 7</option>\n\
                                    <option value="1">Chủ nhật</option>\n\
                                </select>\n\
                            </div>\n\
                            <div class="col-sm-4">\n\
                                <div class="input-group date" data-provide="datepicker">\n\
                                    <input type="text" name="Timework[' + rows + '][timeserving_from]" class="form-control init-time" placeholder="Bắt đầu làm việc">\n\
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>\n\
                                </div>\n\
                            </div>\n\
                            <div class="col-sm-4">\n\
                                <div class="input-group date" data-provide="datepicker">\n\
                                    <input type="text" name="Timework[' + rows + '][timeserving_to]" class="form-control init-time" placeholder="Kết thúc làm việc">\n\
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div>\n\
                                </div>\n\
                            </div>\n\
                            <div class="col-sm-2">\n\
                                <button type="button" class="btn btn-info pull-left remove-each btn-flat">Xóa</button>\n\
                            </div>\n\
                        </div>';
            $('#customize-time').append(html);
            $('.init-time').datetimepicker({
                format: 'LT'
            });
            $('.remove-each').click(function(){
                $(this).parent().parent().remove();
            });
        });
        $('#add-row-time .remove').click(function(){
            $('#customize-time').children().last().remove();
        });
        $('.remove-each').click(function(){
            $(this).parent().parent().remove();
        });
    });
</script>
