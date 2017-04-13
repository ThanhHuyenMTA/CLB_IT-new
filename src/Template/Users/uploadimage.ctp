<!-- edit picture user -->

<form action="" method="post" enctype="multipart/form-data">
    <label class="btn btn-primary" f or="my-file-selector" style="color: black;background-color: #eff3f6;font-weight: bold;">
        <input id="image" type="file" style="display:none;" name='image' multiple='multiple' onclick='loadimage' onchange="$('#upload-file-info').html($(this).val());">
        <i class="fa fa-arrow-circle-o-up"></i> Choose
    </label>
    <button class="submit_image" type="submit" name="submit" >Upload new!</button>
</form>
<!-- end edit picture user -->

