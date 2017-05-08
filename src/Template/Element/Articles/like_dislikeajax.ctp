<script language="javascript">
    function likea(formId, btnId, btnDL) {
        $.ajax({
            url: "http://localhost/NewCLB/articles/ajaxlike",
            type: "POST",
            dataType: "text",
            data: $(formId).serialize(),
            context: document.body,
            //data: {like: $("#like").val(),id: $("#ida").val()},
            success: function (result) {
                console.log(result); //return ket qua
                if ($.parseJSON(result) != 'fail') {
                    var data = $.parseJSON(result); //ham chuyen ve dang mang
                    $(btnId).html(data['likes']);
                    $(btnDL).html(data['dislikes']);
                    if (data.type == 1) {
                        $('.postlike-' + data.id).css("color", "red");
                        $('.postdislike-' + data.id).css("color", "black");
                    } else {
                        $('.postlike-' + data.id).css("color", "black");
                    }


                    // $(btnDL).html(result);
                } else {
                    // $('.fade').css('display','inherit');
                    // $('.modal-content').css('display','inherit');
                    console.log('1234');
                    //debugger;
                    alert('You must be logged in to vote');
                }

            },
            //phan kiemtraloi
            error: function (xhr, thrownError) {
                alert(xhr.status);
                alert(xhr.responseText);
                alert(thrownError);
            }

            //$('form').removeClass('#fm_like')
        });
    }

    function dislikea(formId, btnId, btnL) {
        $.ajax({
            url: "http://localhost/NewCLB/articles/ajaxdislike",
            type: "POST",
            dataType: "text",
            data: $(formId).serialize(),
            context: document.body,
            success: function (result) {

                console.log(result); //return ket qua
                if ($.parseJSON(result) != 'fail') {
                    var data = $.parseJSON(result); //ham chuyen ve dang mang
                    $(btnId).html(data['dislikes']);
                    $(btnL).html(data['likes']);
                    if (data.type == 2) {
                        $('.postdislike-' + data.id).css("color", "blue");
                        $('.postlike-' + data.id).css("color", "black");
                        console.log('vao day', data.id);
                    } else {
                        $('.postdislike-' + data.id).css("color", "black");
                        console.log('vao day', data.id);
                    }
                } else {
                    // $('.fade').css('display','inherit');
                    // $('.modal-content').css('display','inherit');
                    console.log('1234');
                    //debugger;
                    alert('You must be logged in to vote');
                }


            },
            //phan kiemtraloi
            error: function (xhr, thrownError) {
                alert(xhr.status);
                alert(xhr.responseText);
                alert(thrownError);
            },
        });
    }

</script>
