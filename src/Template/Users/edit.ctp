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
      <?php echo $this->Form->create($article); ?>
      <?php echo $this->Form->input('name');?>
      <?php  echo $this->Form->input('email');?>
      <?php echo $this->Form->input('password');?>
      
      <label class="radio-inline">         
        <input name="sex" id="inlineCheckbox1" value="male" type="radio" required="false">Boy
      </label>
      <label class="radio-inline">         
        <input name="sex" id="inlineCheckbox2" value="female" type="radio" required="false">Girl 
      </label>
      <br>
      <br>
       <?php echo $this->Form->button(__('Edit')); ?>
       <?php  echo $this->Form->end();?>
      
     </div>
   </div>

  </div>

</body>
</html>
