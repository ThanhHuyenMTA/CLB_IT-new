<!-- \src\Template\Cvs\edit.ctp -->
<?php echo $this->Html->script('Admin.moment-with-locales.js');?>
<?php echo $this->Html->script('Admin.bootstrap-datetimepicker.js');?>
<?php echo $this->Html->css('Admin.bootstrap-datetimepicker.css');?>
<?php echo $this->Html->script('Admin.moment-with-locales.js');?>
<?php echo $this->Html->script('jquery.datetimepicker.full.min.js');?>
<?php echo $this->Html->css('bootstrap-multiselect.css');?>
<?php echo $this->Html->script('bootstrap-multiselect.js');?>
<?php echo $this->Html->css('jquery.datetimepicker.css');?>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
<?php echo $this->Html->script("create_cv") ?>
 <?= $this->Html->script(['bootstrap-datepicker','angular.min','app/common','jquery.validate.min','contacts'], ['inline' =>false]);?>


<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
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
        <li><?php echo $this->Html->link('Quản lý Cv', array('controller' => 'Cvs', 'action' => 'index'));?></li>
        <li class="active"><?php echo $cv['employee']['full_name'];?></li>
    </ol>
</section>

<?php echo $this->Html->script(array('jquery.validate.min', 'Admin.moment-with-locales','jquery.datetimepicker.full.min', 'create_cv'), array('inline' => false));?>
<?php echo $this->Html->css(array('jquery.datetimepicker'), array('inline' => false));?>
<?php echo $this->Html->css('bootstrap-multiselect.css');?>
<?php echo $this->Html->script('bootstrap-multiselect.js');?>
<?php echo $this->assign('title', $title);?>
<?php $this->assign("title_html","update_cv")?>
<div class = "container-grey">
    <div class = "container create-cv">
        <div class='create-cv-tittle'>Cập nhật hồ sơ tìm việc</div>
    <?php
    $this->Form->templates([
        'inputContainer' => '<div class="col-md-9">{{content}}</div>',
    ]);
    echo $this->Form->create('cv', array(
        'type' => 'file',
        'class' => 'form-create-cv form-horizontal',
        'id' => 'form-create-cv',
        'role' => 'form'
    ));
    ?>
        <?= $this->Form->input('Cv.avatar', ['type' => 'hidden', 'id' => 'cv_avatar', 'value' => $cv['avatar']]);?>
        <div class='cv-information' style="margin-top: 20px;">
            <div class="cv-information-tittle">Thông tin cá nhân<span class="required"> *</span></div>
            <div class='cv-information-left col-md-9'>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Tên hồ sơ<span class="required"> *</span></label>
                    <?= $this->Form->input('Cv.name', [
                                    'label' => false,
                                    'id' => 'name',
                                    'class' => 'form-control',
                                    'value' => !empty($cv['name']) ? $cv['name'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-md-3 control-label">Ứng viên<span
                        class="required"> *</span></label>
                    <div class="col-md-9">
                        <?= $this->Form->select('employee_id', $listCustomer,['class' => 'form-control', 'id' => 'full_name', "value" => $cv['employee_id']]);
                    ?>
                    </div>
                </div>
                <div class="form-group gender">
                    <label for="gender" class="col-md-3 control-label">Giới tính<span class="required"> *</span></label>
                    <div class="col-md-9">
                        <label class="radio-style">
                            <input type="radio" value="1" name='Cv[customer_gender]' <?php if($cv['customer_gender'] == 1){ ?> checked=""<?php } ?> />
                            <img class="radio-uncheck" src="<?= '..' . $this->request->webroot?>img/icon/radio-uncheck.png" alt = "Không chọn">
                            <img class="radio-checked" src="<?= '..' . $this->request->webroot?>img/icon/radio-checked.png" alt = "Chọn"></i>
                            <span>Nam</span>
                        </label>
                        <label class="radio-style">
                            <input type="radio" value="0" name='Cv[customer_gender]' <?php if($cv['customer_gender'] == 0){ ?> checked=""<?php } ?>/>
                            <img class="radio-uncheck" src="<?= '..' . $this->request->webroot?>img/icon/radio-uncheck.png" alt = "Không chọn">
                            <img class="radio-checked" src="<?= '..' . $this->request->webroot?>img/icon/radio-checked.png" alt = "Chọn"></i>
                            <span>Nữ</span>
                        </label>
                    </div>
                </div>
                <div class="form-group birthday">
                    <label for="birthday" class="col-md-3 control-label">Ngày sinh<span class="required"> *</span></label>
                    <div data-provided = 'datepicker'>
                         <?= $this->Form->input('Cv.customer_birthday', [
                                    'label' => false,
//                                    'type' => 'date',
                                    'id' => 'birthday',
                                    'class' => 'form-control',
                                    'value' => $cv['customer_birthday']
                                ])?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Địa chỉ email<span class="required"> *</span></label>
                    <?= $this->Form->input('Cv.customer_email', [
                                    'label' => false,
                                    'id' => 'email',
                                    'class' => 'form-control',
                                    'type' => 'email',
                                    'value' => !empty($cv['customer_email']) ? $cv['customer_email'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="phone_number" class="col-md-3 control-label">Số điện thoại<span class="required"> *</span></label>
                    <?= $this->Form->input('Cv.customer_mobile', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['customer_mobile']) ? $cv['customer_mobile'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="height" class="col-md-3 control-label">Chiều cao(cm)<span class="required"></span></label>
                    <?= $this->Form->input('Cv.height', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['height']) ? $cv['height'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="weight" class="col-md-3 control-label">Cân nặng(kg)<span class="required"></span></label>
                    <?= $this->Form->input('Cv.weight', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['weight']) ? $cv['weight'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="marry" class="col-md-3 control-label">Tình trạng hôn nhân</label>
                    <div class="col-md-9">
                        <label class="radio-style">
                            <input type="radio" value="0" name='Cv[customer_is_married]'  <?php if($cv['customer_is_married'] == 0){ ?> checked=""<?php } ?>>
                            <img class="radio-uncheck" src="<?= '..' . $this->request->webroot?>img/icon/radio-uncheck.png" alt = "Không chọn">
                            <img class="radio-checked" src="<?= '..' . $this->request->webroot?>img/icon/radio-checked.png" alt = "Chọn"></i>
                            <span>Độc thân</span>
                        </label>
                        <label class="radio-style">
                            <input type="radio" value="1" name='Cv[customer_is_married]' <?php if($cv['customer_is_married'] == 1){ ?> checked=""<?php } ?>>
                            <img class="radio-uncheck" src="<?= '..' . $this->request->webroot?>img/icon/radio-uncheck.png" alt = "Không chọn">
                            <img class="radio-checked" src="<?= '..' . $this->request->webroot?>img/icon/radio-checked.png" alt = "Chọn"></i>
                            <span>Đã có gia đình</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-md-3 control-label">Địa chỉ liên hệ<span class="required"> *</span></label>
                    <?= $this->Form->input('Cv.address', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['address']) ? $cv['address'] : ''
                                ])?>
                </div>
                <div class="form-group">
                    <label for="city" class="col-md-3 control-label">Tỉnh / Thành phố<span class="required"> *</span></label>
                    <div class="col-md-3">
                            <?= $this->Form->select('Cv.province_id', $listProvince, [
                                    'div' => false,
                                    'label' => false,
                                    'id' => 'province_id',
                                    'class' => 'form-control',
                                    'value' => !empty($cv['province_id']) ? $cv['province_id'] : null
                                ])?>
                    </div>

                    <label for="district" class="control-label col-md-2">Quận / Huyện<span class="required"> *</span></label>
                    <div class="col-md-4">
                            <?= $this->Form->select('Cv.district_id', $listDistrict, [
                                    'div' => false,
                                    'label' => false,
                                    'id' => 'district_id',
                                    'class' => 'form-control',
                                    'value' => !empty($cv['district_id']) ? $cv['district_id'] : null
                                ])?>
                    </div>
                    <div class="col-md-9 is-student">
                        <label>
                            <input type="hidden" name="Cv[is_student]" value="0">
                            <input type="checkbox" name="Cv[is_student]" value="1" id="student_checked" <?php if($cv['is_student']==1){?> checked=""<?php }?>>Đang là sinh viên
                         </label>
                    </div>
                    <div class="collapse col-md-9" id="inforSchool">
                        <div class="form-group">
                            <label for="name_school" class="col-md-2 control-label">Trường</label>
                            <div class="col-md-10">
                                <?= $this->Form->input('Cv.school', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['school']) ? $cv['school'] : ''
                                ])?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course" class="col-md-2 control-label">Ngành học</label>
                            <div class="col-md-5">
                                <?= $this->Form->input('Cv.school_course', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['school_course']) ? $cv['school_course'] : ''
                                ])?>
                            </div>
                            <label for="year" class="col-md-2 control-label">Năm thứ</label>
                            <div class="col-md-3">
                                <?= $this->Form->input('Cv.school_year', [
                                    'label' => false,
                                    'class' => 'form-control',
                                    'value' => !empty($cv['school_year']) ? $cv['school_year'] : ''
                                ])?>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class='cv-information-right col-md-3 text-center'>
                <div id="wrapper-avatar-upload"> 
                    <div id="image-holder">
                        <img id="user_avatar" src="<?= !empty($cv['avatar']) ? $urlhome. $cv['avatar'] : ''?>" class="thumb-image" alt = "Ảnh đại diện"/>
                    </div>
                    <div class="input-group image-preview col-md-10">
                        <span class="input-group-btn pull-left">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span>Giữ ảnh ban đầu
                            </button>
                            <!-- image-preview-input -->
<!--                            <div class="btn btn-default image-preview-input user_employee_profile_input_change">-->
                            <div>
                                <span class="glyphicon glyphicon-folder-open"></span>
<!--                                <label class="custom-file-upload uploadCV"  for="fileAvatarUpload" >-->
<!--                                    Chọn ảnh khác</label>-->
                                <label for="fileAvatarUpload" class="custom-file-upload_removed custom-file-upload">
                                    Chọn ảnh khác
                                </label>
                                <?= $this->Form->input('Cv.avatar', array(
                                    'type' => 'file',
                                    'id'=>'fileAvatarUpload',
                                    'multiple'=>'multiple',
                                    'label' => false,
                                    'option' => array(
                                        'accept' => 'image/png, image/jpeg, image/gif'
                                    )
                                ))?>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class='cv-information'>
            <div class="cv-information-tittle">Thông tin tổng quan<span class="required"> *</span></div>
            <div class='cv-information-left col-md-9'>
                <div class="form-group">
                    <label for="enjoy_job" class="col-md-3 control-label">Công việc mong muốn<span class="required"> *</span></label>
                    
                    <?php $cv['work'] = explode(",",$cv['work'] );
                    echo $this->Form->input('Cv.work',['options'=>$categories,'multiple'=>'multiple','id'=>'work_place','default'=>false,'class' => 'form-control','label' => false,'value' => !empty($cv['work']) ? $cv['work'] : null]);?>
                </div>
                <div class="form-group">
                    <label for="salary" class="col-md-3 control-label">Mức lương mong muốn</label>
                    <div class="col-md-3">
                        <?= $this->Form->input('Cv.salary', [
                                        'label' => false,
                                        'class' => 'form-control',
                                        'value' => !empty($cv['salary']) ? $cv['salary'] : ''
                                    ])?>
                    </div>
                    <div class="col-md-1 text-center"> 
                        <span style="float:left;margin-top: 8px;font-weight: bold">VNĐ/</span>
                    </div>
                    <div class="col-md-2"> 

                        <?php if($cv['unit']==1){?>
                            <select name="Cv[unit]" class="form-control">
                                <option value="1" selected="">Giờ</option>
                                <option value="2">Ngày</option>
                                <option value="3">Tháng</option>
                            </select>
                        <?php } else {?>
                            <select name="Cv[unit]" class="form-control">
                                <option value="1">Giờ</option>
                                <option value="2" selected="">Ngày</option>
                                <option value="3">Tháng</option>
                            </select>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="time_work" class="col-md-3 control-label">Thời gian làm việc<span class="required"> *</span></label>
                    <div class="col-md-9" style="padding-left: 0px;">
                        <div class="col-md-3 time_work check">
                            <label style="margin-top: 7px;">
                                <input type="hidden" name="TimeWork[is_all_week]" value="0" >
                                <input type="checkbox" name="TimeWork[is_all_week]" value="1" <?php if($allDay != NULL) { ?> checked="checked" <?php }?>>
                                Cả tuần
                            </label>
                            <?= $this->Form->input('TimeWork[0][time_work]', ['type' => 'hidden', 'id' => 'time_work_0', 'value' => '0']);?>
                        </div>
                        <div class="time-in-day" id="timeInDayAllWeek">
                            <input type="hidden" name="TimeWork[0][id]" value="<?= isset($allDay->id) ? $allDay->id : '' ?>">
                            <div class="col-md-1 time_work" style="display: inline-block;float: left;line-height: 35px;text-indent: 5px;font-weight: bold"> Từ </div>
                            <div class="col-md-3">
                                <input type="text" name="TimeWork[0][timeserving_from]" class="form-control time_start" id="time_start" value="<?=isset($allDay->timeserving_from) ? convertToTime($allDay->timeserving_from) : ''?>" required=""/>
                            </div>
                            <div class="col-md-1 time_work" style="display: inline-block;float: left;line-height: 35px;text-indent: 5px;font-weight: bold"> Đến </div>
                            <div class="col-md-3">
                                <input type="text" name="TimeWork[0][timeserving_to]" class="form-control time_end" id="time_end" value="<?=isset($allDay->timeserving_to) ? convertToTime($allDay->timeserving_to) : ''?>" required=""/>
                            </div>
                        </div>
                    </div>
                    <div class="time-option">
                    
                    <div id="time-one-day">
                        <?php $i=1;
                        foreach ($timeWorks as $timeWorks){ ?>
                        <div class="col-md-9 time_work time-one-day col-md-offset-3">
                            <input type="hidden" name="TimeWork[<?= $i?>][id]" value="<?php echo $timeWorks->id ?>">
                            <div class="col-md-3 time_work">
                                <select name="TimeWork[<?=$i?>][day]" class="form-control valid" aria-invalid="false">
                                    <option value="1" <?php if($timeWorks->day == 1) { ?> selected="" <?php } ?>>Thứ 2</option>
                                    <option value="2" <?php if($timeWorks->day == 2) { ?> selected="" <?php } ?>>Thứ 3</option>
                                    <option value="3" <?php if($timeWorks->day == 3) { ?> selected="" <?php } ?>>Thứ 4</option>
                                    <option value="4" <?php if($timeWorks->day == 4) { ?> selected="" <?php } ?>>Thứ 5</option>
                                    <option value="5" <?php if($timeWorks->day == 5) { ?> selected="" <?php } ?>>Thứ 6</option>
                                    <option value="6" <?php if($timeWorks->day == 6) { ?> selected="" <?php } ?>>Thứ 7</option>
                                    <option value="7" <?php if($timeWorks->day == 7) { ?> selected="" <?php } ?>>Chủ nhật</option>
                                </select>
                            </div>
                            <div class="time-in-day">
                                <div class="col-md-1 time_work"> Từ </div>
                                <div class="col-md-3">
                                    <input type="text" name="TimeWork[<?=$i?>][timeserving_from]" class="form-control time_start" id="time_start" value="<?=isset($timeWorks->timeserving_from) ? convertToTime($timeWorks->timeserving_from) : ''?>" required=""/>
                                </div>
                                <div class="col-md-1 time_work"> Đến </div>
                                <div class="col-md-3">
                                    <input type="text" name="TimeWork[<?=$i?>][timeserving_to]" class="form-control time_end" id="time_end" value="<?=isset($timeWorks->timeserving_to) ? convertToTime($timeWorks->timeserving_to) : ''?>" required=""/>
                                </div>
                            </div>
                        </div>
                        <?php $i++; } ?>
                    </div>
                    
                    <div class="col-md-3 btn-add-day col-md-offset-3" id="div-button-add-day">
                        <button type="button" class="btn btn-add-day" id="buttonAddDay">Thêm ngày</button>
                    </div> 
                    </div>
               
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-3 control-label">Nhận xét bản thân</label>
                    <?= $this->Form->input('Cv.description', [
                                        'label' => false,
                                        'class' => 'form-control',
                                        'type'=>'textarea',
                                        'value' => !empty($cv['description']) ? $cv['description'] : ''
                                    ])?>
                </div>

            </div>
        </div>

        <div class='cv-information'>
            <div class="cv-information-tittle">Kinh nghiệm làm việc</div>
                <?php if ($countEx!=0){ 
                    $i=0;?>
                    <div id="add-experience">
                    <?php foreach ($experiences as $experience){ ?>
                        <?php // pr($experience); ?>
                        <div class='cv-information-left col-md-9 experience'>
                            
                            <div class="form-group">
                                <input type="hidden" name="Experience[<?= $i?>][id]" value="<?php echo $experience['id'] ?>">
                                
                                <label for="company_name" class="col-md-3 control-label">Tên công ty<span class="required"></span></label>
                                <div class="col-md-9">
                                <input type="text" name="Experience[<?= $i?>][company_name]" class="form-control" id="experiences-company-name" value="<?= !empty($experience['company_name']) ? $experience['company_name'] : ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-md-3 control-label">Chức vụ<span class="required"></span></label>
                                <div class="col-md-9">
                                <input type="text" name="Experience[<?= $i?>][level]" class="form-control" id="experiences-level" value="<?= !empty($experience['level']) ? $experience['level'] : ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time_work" class="col-md-3 control-label">Thời gian làm việc<span class="required"></span></label>
                                <div class="col-md-9">
                                    <div class="col-md-1 time_work"> Từ </div>
                                    <div class="col-md-5">
                                        <input type="text" name="Experience[<?= $i?>][date_start]" class="form-control date_start" id="experiences-date-start" value="<?= !empty($experience['date_start']) ? convertDate($experience['date_start']) : ''?>">
                                        
                                    </div>
                                    <div class="col-md-1 time_work"> Đến </div>
                                    <div class="col-md-5">
                                        <input type="text" name="Experience[<?= $i?>][date_end]" class="form-control date_end" id="experiences-date-end" value="<?= !empty($experience['date_start']) ? convertDate($experience['date_end']) : ''?>">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description_work" class="col-md-3 control-label">Mô tả công việc</label>
                                <div class="col-md-9">
                                    <textarea name="Experience[<?= $i?>][description]" class="form-control"><?=!empty($experience['description']) ? $experience['description'] : ''?></textarea>
                                  
                                </div>
                            </div>
                            
                            <?php $i++; ?>
                        </div>
                        
            <?php } ?>
                    </div>
                    <div class="col-md-10 cv-information-add-experience">
                        <button type="button" class="btn btn-add-day" id="buttonAddExperience">+ Thêm kinh nghiệm</button>
                    </div>
            <?php } else {
                echo "<h4>Bạn chưa có kinh nghiệm</h4>";?>
                    <div id="add-experience">
                    </div>
                <div class="col-md-10 cv-information-add-experience">
                <button type="button" class="btn btn-add-day" id="buttonAddExperience">+ Thêm kinh nghiệm</button>
                </div>
            <?php }?>
            
        </div>
        <div class="submit-created-cv">
            <button type="submit" class="btn button button_all" style="width: 172px;">CẬP NHẬT HỒ SƠ</button>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<script type="text/javascript">
    
</script>
