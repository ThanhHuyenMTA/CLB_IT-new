<!-- \src\Template\Cvs\add.ctp -->
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
                array('escape' => false)); ?>
        </li>
        <li><?php echo $this->Html->link('Quản lý Cv', array('controller' => 'Cvs', 'action' => 'index')); ?></li>
        <li class="active">Thêm mới</li>
    </ol>
</section>


<div class="container recruitment_personal_register">
    <div class="container create-cv">
        <div class="row">
            <div class='create-cv-tittle col-md-12 col-md-12'>Tạo hồ sơ tìm việc</div>
            <?php
            $this->Form->templates([
                'inputContainer' => '<div class="col-md-9">{{content}}</div>',
            ]);
            echo $this->Form->create('cv', array(
                'type' => 'post',
                'class' => 'form-create-cv form-horizontal',
                'id' => 'form-create-cv',
                'role' => 'form'
            ));
            ?>
            <?= $this->Form->input('Customer.user_id', ['type' => 'hidden', 'id' => 'user_id', 'value' => $this->request->session()->read('Auth.User.id')]); ?>
            <?= $this->Form->input('Cv.avatar', ['type' => 'hidden', 'id' => 'cv_avatar', 'value' => '']); ?>
            <div class='cv-information col-md-12 col-md-12 container' style="margin-top: 20px;">
                <div class="row">
                    <div class="cv-information-tittle col-md-12">Thông tin cá nhân<span class="required"> *</span></div>
                    <div class='cv-information-left col-md-9'>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Tên hồ sơ<span
                                    class="required"> *</span></label>
                            <?= $this->Form->input('Cv.name', ['label' => false, 'class' => 'form-control', 'id' => 'name']) ?>
                        </div>
                       <div class="form-group">
                            <label for="full_name" class="col-md-3 control-label">Ứng viên<span
                                    class="required"> *</span></label>
                            <div class="col-md-9">
                                <?= $this->Form->select('employee_id', $listCustomer,['class' => 'form-control', 'id' => 'full_name']);
                            ?>
                            </div>
                        </div>
                        <div class="form-group gender">
                            <label for="gender" class="col-md-3 control-label">Giới tính<span class="required"> *</span></label>
                            <div class="col-md-9">
                                <label class="radio-style">
                                    <input type="radio" value="1" name='Cv[customer_gender]' checked=""/>
                                    <span>Nam</span>
                                </label>
                                <label class="radio-style">
                                    <input type="radio" value="0" name='Cv[customer_gender]'/>
                                    <span>Nữ</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group birthday">
                            <label for="birthday" class="col-md-3 control-label">Ngày sinh<span
                                    class="required"> *</span></label>
                            <?php 
                                if(isset($customerInfo['birthday']) && !empty($customerInfo['birthday'])){
                                    $birthday = $customerInfo['birthday']->format("d/m/Y");                                     
                                }else{
                                    $birthday = null;
                                }
                                ?>
                            <?= $this->Form->input('Cv.customer_birthday', ['label' => false, 'class' => 'form-control', 'id' => 'birthday', 'value' => $birthday]) ?>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Địa chỉ email<span
                                    class="required"> *</span></label>
                            <?= $this->Form->input('Cv.customer_email', ['label' => false, 'class' => 'form-control', 'type' => 'email']) ?>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-md-3 control-label">Số điện thoại<span
                                    class="required"> *</span><span style="opacity: 0.5"> (+84) </span></label>
                            <?= $this->Form->input('Cv.customer_mobile', ['label' => false, 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label for="height" class="col-md-3 control-label">Chiều cao(cm)<span
                                    class="required"></span></label>
                            <?= $this->Form->input('Cv.height', ['label' => false, 'class' => 'form-control',]) ?>
                        </div>
                        <div class="form-group">
                            <label for="weight" class="col-md-3 control-label">Cân nặng(kg)<span
                                    class="required"></span></label>
                            <?= $this->Form->input('Cv.weight', ['label' => false, 'class' => 'form-control',]) ?>
                        </div>
                        <div class="form-group">
                            <label for="marry" class="col-md-3 control-label">Tình trạng hôn nhân</label>
                            <div class="col-md-9">
                                <label class="radio-style">
                                    <input type="radio" value="0" name='Cv[customer_is_married]' checked>

                                    <span>Độc thân</span>
                                </label>
                                <label class="radio-style">
                                    <input type="radio" value="1" name='Cv[customer_is_married]'>
                                    
                                    <span>Đã có gia đình</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-md-3 control-label">Địa chỉ liên hệ<span class="required"> *</span></label>
                            <?= $this->Form->input('Cv.address', ['label' => false, 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-md-3 control-label">Tỉnh / Thành phố<span
                                    class="required"> *</span></label>
                            <div class="col-md-3">
                                <?= $this->Form->select('Cv.province_id', $listProvince, [
                                    'div' => false,
                                    'label' => false,
                                    'id' => 'province_id',
                                    'class' => 'form-control',
                                    'empty' => "--Tỉnh/Tp--",
                                    
                                ]) ?>
                            </div>

                            <label for="district" class="control-label col-md-2">Quận / Huyện<span
                                    class="required"> *</span></label>
                            <div class="col-md-4">
                                <?= $this->Form->select('Cv.district_id', $listDistrict, [
                                    'div' => false,
                                    'label' => false,
                                    'id' => 'district_id',
                                    'class' => 'form-control',
                                    'empty' => '--Quận/Huyện--',
                                    
                                ]) ?>
                            </div>
                            <div class="col-md-9 is-student col-sm-offset-3">
                                <label>
                                    <?= $this->Form->checkbox('Cv.is_student', array("id" => "student_checked")) ?> Đang là sinh viên
                                </label>
                            </div>
                            <div class="collapse col-md-9 col-sm-offset-3" id="inforSchool">
                                <div class="form-group">
                                    <label for="name_school" class="col-md-2 control-label">Trường</label>
                                    <div class="col-md-10">
                                        <input type="text" name="Cv[school]" id="name_school" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="course" class="col-md-2 control-label">Ngành học</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Cv[school_course]" id="school_course" class="form-control"/>
                                    </div>
                                    <label for="year" class="col-md-2 control-label">Năm thứ</label>
                                    <div class="col-md-2">
                                        <input type="text" name="Cv[school_year]" id="school_year" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class='cv-information-right col-md-3 text-center'>
                        <!--                <form enctype="multipart/form-data">-->
                        <div id="wrapper-avatar-upload">
                            <div id="image-holder">                                
                                <img id="user_avatar" src = "<?php echo $urlhome."img/no_avatar.png"; ?>" class="thumb-image img-thumbnail" alt = "Ảnh đại diện"/>                                
                            </div>
                            <label for="fileAvatarUpload" class="custom-file-upload_removed custom-file-upload">
                                Đổi hình đại diện
                            </label>
                            <input id="fileAvatarUpload" multiple="multiple" type="file"/>
                            <!--                        <input id="fileAvatarUpload" multiple="multiple" type="file"/>-->
                            <div class="input-group-btn">
                                <button type="button" tabindex="500" title="Xóa ảnh đã chọn" id="btn-delete-avatar_"
                                        class="btn btn-default fileinput-remove_removed fileinput-remove-button_removed"><i
                                        class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Xóa</span></button>
                                <button type="button" tabindex="500" title="Lưu ảnh đã chọn" id="btn-save-avatar"
                                        class="btn btn-default fileinput-upload fileinput-upload-button"><i
                                        class="glyphicon glyphicon-upload"></i> <span class="hidden-xs">Lưu</span></button>
                            </div>
                        </div>

                        <!--                </form>-->
                    </div>
                </div>
            </div>

            <div class='cv-information col-md-12 container'>
                <div class="row">
                    <div class="cv-information-tittle col-md-12 col-sm-12">Thông tin tổng quan<span class="required"> *</span></div>
                    <div class='cv-information-left col-md-9 col-sm-12'>
                        <div class="form-group">
                            <div class="enjoy_job">
                                <label for="enjoy_job" class="col-md-3 control-label">Công việc mong muốn<span
                                    class="required"> *</span></label>
                                <?php echo $this->Form->input('Cv.work',['options'=>$categories,'default'=>false,'class' => 'form-control','label' => false,'id'=>'work_place','multiple'=>'multiple']);?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="salary" class="col-md-3 control-label" >Mức lương mong muốn</label>
                            <div class="col-md-3 salary">
                                <input type = "text" name="Cv[salary]" class="form-control"/>
                            </div>
                            <div class="col-md-1 text-center"> 
                                <span style="float:left;margin-top: 8px;font-weight: bold">VNĐ/</span>
                            </div>
                            <div class="col-md-2"> 
                                <div class="">
                                    <select name="Cv[unit]" class="form-control">
                                        <option value="1">Giờ</option>
                                        <option value="2">Ngày</option>
                                        <option value="3">Tháng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time_work" class="col-md-3 control-label">Thời gian làm việc<span class="required"> *</span></label>
                            <div class="col-md-9" >
                                <div class="row">
                                    <div class="col-md-3 time_work check">
                                        <label data-target="#timeInDayAllWeek" style="margin-top: 7px;">
                                        <?= $this->Form->checkbox('TimeWork.is_all_week', ['checked' => false]) ?> Cả tuần
                                        </label>
                                        <?= $this->Form->input('TimeWork[0][time_work]', ['type' => 'hidden', 'id' => 'time_work_0', 'value' => '0']);?>
                                    </div>
                                    <div class="time-in-day" id="timeInDayAllWeek">
                                        <div class="col-md-1 time_work" style="display: inline-block;float: left;line-height: 35px;text-indent: 5px;font-weight: bold"> Từ </div>
                                        <div class="col-md-3">

                                            <input type="text" name="TimeWork[0][start]" class="form-control time_start" required="true" />
                                        </div>
                                        <div class="col-md-1 time_work" style="display: inline-block;float: left;line-height: 35px;text-indent: 5px;font-weight: bold"> Đến </div>
                                        <div class="col-md-3">
                                            <input type="text" name="TimeWork[0][end]" class="form-control time_end"  required="true"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="time-option">
                            <div id="time-one-day" style="display: none;">

                                <div class="col-md-9 time_work time-one-day col-md-offset-3">
                                    <div class="col-md-3 time_work">
                                        <select name="TimeWork[1][time_work]" class="form-control valid time_work" aria-invalid="false" id = "time_work_day">
                                            <option value="1">Thứ 2</option>
                                            <option value="2">Thứ 3</option>
                                            <option value="3">Thứ 4</option>
                                            <option value="4">Thứ 5</option>
                                            <option value="5">Thứ 6</option>
                                            <option value="6">Thứ 7</option>
                                            <option value="7">Chủ nhật</option>
                                        </select>
                                    </div>
                                    <div class="time-in-day">
                                        <div class="col-md-1 time_work"> Từ </div>
                                        <div class="col-md-3">
                                            <input type="text" name="TimeWork[1][start]" class="form-control time_start" required="true"/>
                                        </div>
                                        <div class="col-md-1 time_work"> Đến </div>
                                        <div class="col-md-3">
                                            <input type="text" name="TimeWork[1][end]" class="form-control time_end" required="true"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 btn-add-day col-md-offset-3" id="div-button-add-day" style="display: none;">
                                <button type="button" class="btn btn-add-day" id="buttonAddDay">Thêm ngày</button>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Nhận xét bản thân</label>
                            <?= $this->Form->input('Cv.description', ['label' => false, 'class' => 'form-control', 'type' => 'textarea']) ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class='cv-information col-md-12 container'>
                <div class="row">
                    <div class="cv-information-tittle">Kinh nghiệm làm việc</div>
                    <div id="add-experience">
                    </div>
                    <div class="col-md-10 cv-information-add-experience">
                        <button type="button" class="btn btn-add-day" id="buttonAddExperience">+ Thêm kinh nghiệm</button>
                    </div>
                </div>

            </div>
            <div class="submit-created-cv col-md-12">
                <button type="submit" class="button_all">TẠO HỒ SƠ</button>
                <button type="reset" class="button_all">HỦY</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
