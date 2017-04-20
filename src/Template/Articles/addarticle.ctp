<?php // echo $this->Html->script('ckeditor/ckeditor'); ?>
<div class="row">
    <div id="main-content" class="col-md-12">
        <div class="box">
            <button type="button" id="AA">
                AddArticle
            </button> 
            <input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click Me"/>
            <div id="add"></div>
            <a href="javascript:void(0);" onclick="bb();">aa</a>
        </div>
    </div>
</div>
<body>
    <script type=”text/javascript”>        
        //    function load_fm() {
        //        // console.log('vao day');
        //        $.ajax({
        //            //  url: "http://localhost/NewCLB/articles/addAr",
        //            type: "POST",
        //            dataType: "json",
        //            context: document.body,
        //            data: {},
        //            success: function () {
        //                // $('#add').css("display", "inherit");
        //                $("#add").load("http://localhost/NewCLB/articles/addAr");
        //                console.log('vao day');
        //            },
        //            //phan kiemtraloi
        //            error: function (xhr, thrownError) {
        //                alert(xhr.status);
        //                alert(xhr.responseText);
        //                alert(thrownError);
        //            }
        //        });
        //    }
        function load_ajax() {
            $.ajax({
                url: "l/articles/addAr",
                type: "post",
                dataType: "text",
                data: {
                },
                success: function (result) {
                    $('#add').html(result);
                }
            });
        }
        function hideButton() {
            alert('x');
//            $(".loading").hide();
        }
        function showButton() {
            $(".loading").show();
        }


        CKEDITOR.replace('content', {
            language: 'vi',
        });


    </script>
</body>
<script>
    $(document).ready(function () {
        alert('x');
    })
</script>
