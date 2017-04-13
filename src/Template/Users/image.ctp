<?= $this->Html->script('jquery-2.1.1'); ?>

<!-- Core JavaScript Files -->       
<?= $this->Html->script('bootstrap.min'); ?>
<?= $this->Html->script('owl.carousel'); ?>

<form id="imageform" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
    <h1>Upload your images</h1>
    <!--div hiển thị ảnh loading-->
    <div id='imageloadstatus' style='display:none'><img src="images/loader.gif" alt="Uploading...."/></div>
    <!--div hiển thị input file-->
    <div id='imageloadbutton'>
        <input type="file" name="photos[]" id="photoimg" multiple="true" />
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#photoimg').die('click').live('change', function () {
            //Sử dụng ajaxForm trong JQuery
            $("#imageform").ajaxForm({
                target: '#preview',
                beforeSubmit: function () { //việc cần làm trước khi submit
                    $("#imageloadstatus").show();
                    $("#imageloadbutton").hide();
                },
                success: function () {//việc cần làm khi submit thành công
                    $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                },
                error: function () {//việc cần làm khi xảy ra lỗi
                    $("#imageloadstatus").hide();
                    $("#imageloadbutton").show();
                }}).submit();
        });
    });
</script>