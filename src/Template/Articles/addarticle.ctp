<style>
	.slider{
		display:none;
	}
	label{
	   display:none;
	}
	input, textarea, .uneditable-input {
   		 margin-left: -28px;
   		 width: 985px;
	}
	textarea{
	    width: 977px;
	}
	button{
    	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    	margin-left: 912px;
	}
</style>

<?=$this->Form->create();?>
 	<?= $this->Form->control('name', ['type' => 'name','placeholder'=>'Name']); ?>  
 	<br>
    <?= $this->Form->control('content', ['type' => 'textarea','placeholder'=>'Please write here content articles...']); ?>    
    <button class="sumb" type="submit" name="post" >Posts</button>
    <?= $this->Flash->render() ?>
<?=$this->Form->end();?>
