 <?= $this->Html->css('view.css'); ?>


<div class="container-fluid">
  <div class="row-fluid">

    <div class="span3">
      	<strong>General profile  </strong><br> <br>
      	<div><strong class="text-info"> <?= h($user->name) ?> </strong></div>
      	<div class="img-rounded"><?= $this->Html->image($user['image'],array('alt'=>'CakePHP'))?></div>


		<!--<?php echo $this->Form->create('User', array('url' => array('action' => 'create'), 'enctype' => 'multipart/form-data')); ?> -->
       <!-- <?php echo $this->Form->input('', array('type' => 'file')); ?>-->

      	<br>   	
    </div>

    <div class="span9"> 
       <strong> Detailed profile </strong><br> <br>
        <table class="table table-condensed">
			  <thead>
			    <tr>
			      <th><div><strong class="text-info">Item</strong></div></th>
			      <th><div><strong class="text-info">Information</strong></div></th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><strong>Username</strong></td>
			      <td><?= h($user ->username) ?></td>
			    </tr>
			    <tr>
			      
			      <td><strong>Sex</strong></td>
			      <td> <?= h($user ->sex) ?> </td>
			    </tr>
			    <tr>
			      <td><strong>Birthday</strong></td>
			      
			      <td><?= h($user ->birthday) ?></td>
			    </tr>
			    <tr>
			      <td><strong>Phone</strong></td>
			      
			      <td><?= h($user ->phone) ?></td>
			    </tr>
			    <tr>
			      <td><strong>Address</strong></td>
			      
			      <td><?= h($user ->address) ?></td>
			    </tr>
			    <tr>   
			      <td><strong>Job</strong></td>
			      <td><?= h($user ->job) ?></td>
			    </tr>
			    <tr>
			      <td><strong>Email</strong></td>
			      <td><?= h($user ->email) ?></td>
			    </tr>
			   
			  </tbody>
			</table>
    </div>
  </div>
</div>


