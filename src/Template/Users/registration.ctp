<!DOCTYPE html>

<html lang="en">
<head>
  <title>Registration Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= $this->Html->css('Moicake.css') ;?>
  <?= $this->fetch('css'); ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
 <h1 class="text-center"></h1>
 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
   <legend>
       <a href="#"><i class="glyphicon glyphicon-globe"></i></a>Registration member!
   </legend>
   <?php echo $this->Form->create($user, array('require'));?>
      <div class="row">
        <div class="col-xs-6 col-md-6"> 
        </div>
      </div> 
      <?= $this->Form->label('name', 'Name'); ?>
          <?= $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Name','type'=>'name','label'=>false,'required'=>false)) ?>
      <?= $this->Form->label('birthday', 'Birthday'); ?>
         <?= $this->Form->input('birthday',array('class'=>'form-control','type'=>'datetime-local','label'=>false,'required'=>false)) ?>
      <?= $this->Form->label('phone', 'Phone Number'); ?>

          <?= $this->Form->input('phone',array('class'=>'form-control','placeholder'=>'Phone number','type'=>'tel','label'=>false,'required'=>false)) ?>
       <?= $this->Form->label('address', 'Address'); ?>
          <?= $this->Form->
          input('address',array('class'=>'form-control','placeholder'=>'Address','type'=>'name','label'=>false,'required'=>false)) ?>
        <?= $this->Form->label('job', 'Job'); ?>
           <?= $this->Form->input('job',array('class'=>'form-control','placeholder'=>'Job','type'=>'name','label'=>false,'required'=>false)) ?>
        <?= $this->Form->label('username', 'Username'); ?>
            <?= $this->Form->input('username',array('class'=>'form-control','placeholder'=>'Username','type'=>'name','label'=>false,'required'=>false)) ?>
        <?= $this->Form->label('email', 'Email'); ?>
            <?= $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email','type'=>'email','label'=>false,'required'=>false)) ?>
        <?= $this->Form->label('password', 'Password'); ?>
            <?= $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password','type'=>'password','label'=>false,'required'=>false)) ?>
            <?= $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Retype password', 'type'=>'password', 'label'=>false,'required'=>false)) ?>
    
        <div style="margin-left: 20px;float: left;"> 
            <input name="sex" id="inlineCheckbox1" value="male" type="radio" required="false">Boy
        </div>
        <div class="abc" style="margin-left: 20px;">
            <input name="sex" id="inlineCheckbox2" value="female" type="radio" required="false">Girl 
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" r>Registration</button>
   <?php echo $this->Form->end();?>
  </div>
 </div>
</div>

</body>
</html>
