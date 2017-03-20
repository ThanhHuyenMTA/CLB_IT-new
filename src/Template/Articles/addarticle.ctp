<?php echo $this->Html->script('ckeditor/ckeditor');?>

<style>
	.featured{
		display: none;
	}
</style>
<div class="">
	<div class="row">
		<div id="main-content" class="col-md-8">
			<div class="box">
				<center><div class="box-header">
					<h1 class="center">Post Articles</h1>
				</div></center>
				<div class="box-content">
					<div id="contact_form">
						<form name="form1" id="ff" method="post" action="">
							<label>
							<span>Enter name article:</span>
							<input type="text"  name="name" id="name" required>
							</label>
							<label>
							<span>Enter content:</span>
							<textarea class="ckeditor" value="" name="content"></textarea>
							</label>
							<center><input class="sendButton" type="submit" name="Submit" value="Post"></center>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="sidebar" class="col-md-4">
					<!---- Start Widget ---->
					<div class="widget wid-follow">
						<div class="heading"><h4>Follow Us</h4></div>
						<div class="content">
							<ul class="list-inline">
								<li>
									<a href="facebook.com/">
										<div class="box-facebook">
											<span class="fa fa-facebook fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-twitter">
											<span class="fa fa-twitter fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
								<li>
									<a href="facebook.com/">
										<div class="box-google">
											<span class="fa fa-google-plus fa-2x icon"></span>
											<span>1250</span>
											<span>Fans</span>
										</div>
									</a>
								</li>
							</ul>
							 <?= $this->Html->image('/img/new/16.jpg', array('alt' => 'CakePHP', 'style' => 'height:131px;width:330px;')); ?>
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
