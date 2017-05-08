<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<div class="row">
    <div id="main-content" class="col-md-12">
        <div class="box">
            <input class="btn btn-primary" type="button" id="click" value="You can post a new post when you click here !!!" onclick="add_onclick()"/>
            <div id="add">
                <h5 style="margin-left: 22px;">Post Articles</h5>
                <div class="box-content" style="margin-top:-30px;">
                    <div id="contact_form">
                        <form name="form1" id="ff" method="post" action="">
                            <label style="height: 70px;">
                                <span>Enter name article:</span>
                                <input type="text"  name="name" id="name" required>
                            </label>
                            <label>
                                <span>Enter content:</span>
                                <textarea class="ckeditor" value="" name="content"></textarea>
                            </label>
                            <button class="sendButton" type="submit"  name="AddA" style="margin-left: 583px;">Post</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function add_onclick() {
        $("#add").css("display", "inherit");
        $("#click").css("display", "none");
    }
    CKEDITOR.replace('content', {
        language: 'vi'
    });
</script>

