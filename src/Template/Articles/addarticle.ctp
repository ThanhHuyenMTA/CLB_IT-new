<?php echo $this->Html->script('ckeditor/ckeditor');?>
   <div class="row">
                        <div id="main-content" class="col-md-12">
                            <div class="box">
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
                                            <input class="sendButton" type="submit" name="Submit" value="Post" style="margin-left: 583px;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<script type=”text/javascript”>
	CKEDITOR.replace('content', {
	language: 'vi',
	});
</script>
