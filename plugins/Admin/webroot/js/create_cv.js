$(document).ready(function () {
    $('#birthday').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'vi_VN'
    });
    $('#timeserving_from').datetimepicker({
        format: 'hh:mm:ss',
        locale: 'vi_VN'
    });
    $('#timeserving_to').datetimepicker({
        format: 'hh:mm:ss',
        locale: 'vi_VN'
    });
    $("#birthday").keypress(function (event) {
        event.preventDefault();
    });
    
    $(document).on("click", 'a.delete-time-in-day', function () {
        $(this).parent().parent().remove();
        if ($('.col-md-8.time_work.time-one-day').length != 7) {
            $("#buttonAddDay").prop("disabled", false);
        }
        return false;
    });
    $("#fileAvatarUpload").on('change', function () {
        var countFiles = $(this)[0].files.length;
        var imgPath = $(this)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (countFiles > 1) {
            alert('Chỉ chọn một ảnh.');
        } else if(countFiles === 0){
            alert("Chưa chọn ảnh.");
        } else {
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {
                    for (var i = 0; i < countFiles; i++)
                    {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#wrapper-avatar-upload img.thumb-image" ).attr("src",e.target.result);
                        }
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("File không được hỗ trợ.");
                }
            } else {
                alert("File không được hỗ trợ.");
            }
        }
    });
    
    $("#btn-delete-avatar").click(function () {
        $("#wrapper-avatar-upload img.thumb-image" ).attr("src","webroot/upload/avatar/userAvatar.png");
    });
    
    $("#btn-save-avatar").click(function () {
        var file_data = $('#fileAvatarUpload').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('avatar', file_data);
        form_data.append('user_id', $('#user_id').val());
        $('#myPleaseWait').modal('show');
        $.ajax({
                'type': 'post',
                'url': urlhome + 'users/upload_avatar_ajax',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,        
                success: function(d){
                    var data_parse = JSON.parse(d);
                    switch(data_parse.status){
                        case 200:
                            $('#user_avatar').attr('src', data_parse.avatar_url);
                            $('#cv_avatar').val(data_parse.avatar_url);
                             $('#myPleaseWait').modal('hide');
                            break;
                        case 500:
                            $('#myPleaseWait').modal('hide');
                            break;
                        case 400:
                            $('#myPleaseWait').modal('hide');
                            break;
                        case 300:
                            $('#myPleaseWait').modal('hide');
                            break;
                        case 250:
                            $('#myPleaseWait').modal('hide');
                            break;
                    }
                }
           });
    });
    // $('#form-create-cv').validate({
    //     rules: {
    //         'Cv[name]' : 'required',
    //         'Cv[customer_full_name]': "required",
    //         'Cv[customer_gender]': {required: true},
    //         'Cv[customer_birthday]': "required",
    //         'Cv[customer_email]': {
    //             required: true,
    //             email: true,
    //         },
    //         'Cv[customer_mobile]': "required",
    //         'Cv[address]': "required",
    //         'Cv[province_id]': "required",
    //         'Cv[district_id]': "required",
    //         'Cv[work]': "required",
    //         'Experience[][company_name]' : "required",
    //         'Experiences[][level]' : "required",
    //         'Experiences[][date_start]' : "required",
    //         'Experiences[][date_end]' : "required",
    //     },
    //     messages: {
    //         'Cv[name]' : 'Vui lòng nhập tên hồ sơ',
    //         'Cv[customer_full_name]': "Vui lòng nhập họ tên",
    //         'Cv[customer_gender]': {required: true},
    //         'Cv[customer_birthday]': "Vui lòng chọn ngày sinh",
    //         'Cv[customer_email]': {
    //             required: 'Vui lòng nhập email',
    //             email: 'Email không hợp lệ',
    //         },
    //         'Cv[customer_mobile]': "Vui lòng nhập số điện thoại",
    //         'Cv[address]': "Vui lòng nhập điện chỉ liên hệ",
    //         'Cv[province_id]': "Vui lòng chọn tỉnh/thành phố",
    //         'Cv[district_id]': "Vui lòng chọn quận/huyện",
    //         'Cv[work]': "Vui lòng nhập cồng việc mong muốn",
    //         'Experiences[][company_name]' : "Vui lòng nhập tên công ty",
    //         'Experiences[][level]' : "Vui lòng nhập chức vụ",
    //         'Experiences[][date_start]' : "Bắt buộc",
    //         'Experiences[][date_end]' : "Bắt buộc",
    //     },
    //     errorPlacement: function (error, element)
    //     {
    //         if (element.is(":radio"))
    //         {
    //             error.appendTo(element.parents('.gender'));
    //         } else
    //         { // This is the default behavior
    //             error.insertAfter(element);
    //         }
    //     }
    // });
    
});
    var totalClick = 1
     $(document).on("click",'#buttonAddExperience',function () {
        var html = '<div class="cv-information-left col-md-12">';
                html += '<hr>';
                html += '<div class="form-group">';
                    html += '<label for="company_name" class="col-md-2 control-label">Tên công ty<span class="required"></span></label>';
                    html += '<div class="col-md-8"><input type="text" name="Experiences['+totalClick+'][company_name]" class="form-control valid" id="experience-company-name" aria-invalid="false"></div>';
                html += "</div>";
                html += '<div class="form-group">';
                    html += '<label for="level" class="col-md-2 control-label">Chức vụ<span class="required"></span></label>';
                    html += '<div class="col-md-8"><input type="text" name="Experiences['+totalClick+'][level]" class="form-control valid" id="experience-level" aria-invalid="false"></div>';
                html += "</div>";
                
                html += '<div class="form-group">';
                    html += '<label for="time_work" class="col-md-2 control-label">Thời gian làm việc<span class="required"></span></label>';
                    html += '<div class="col-md-8">';
                        html += '<div class="col-md-1 time_work"> Từ </div>';
                        html += '<div class="col-md-4">';
                            html += '<input type="text" name="Experiences['+totalClick+'][date_start]" class="form-control date_start valid" id="date_start'+totalClick+'" aria-invalid="false"/>';
                        html += '</div>';
                        html += '<div class="col-md-1 time_work"> Đến </div>';
                        html += '<div class="col-md-4">';
                            html += '<input type="text" name="Experiences['+totalClick+'][date_end]" class="form-control date_end valid" id="date_end'+totalClick+'" aria-invalid="false" />';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="form-group">';
                    html += '<label for="description_work" class="col-md-2 control-label">Mô tả công việc</label>';
                    html += '<div class="col-md-8">';
                        html += '<textarea name="Experiences['+totalClick+'][description]" class="form-control"></textarea>';
                    html += '</div>';
                html += '</div>';
                 html += '<span class="btn btn-sm btn-danger remove-experience" style="margin: 13px 48%;background: #f26822;">Xóa</span>';
            html += '</div>';
           totalClick++;
        $('#add-experience').append(html);
        addDatePicker();
    });
$(document).on('click', '.remove-experience', function () {
             $(this).parent().remove();
        });
function addDatePicker(){
    /** date picker **/
    $(".date_start").each(function(){
        $(this).datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'vi_VN'
        });
        $(this).keypress(function(event) {event.preventDefault();});
    });
    $(".date_end").each(function(){
        $(this).datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'vi_VN'
        });
        $(this).keypress(function(event) {event.preventDefault();});
    });
}