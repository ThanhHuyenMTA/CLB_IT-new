  
  <?= $this->Html->css('bootstrap.css'); ?>
  <?= $this->Html->css('bootstrap-responsive.css'); ?>
  <?= $this->Html->css('style.css'); ?>
  <?= $this->Html->css('loginm.css') ;?>
  
<div class="loginm">
    <h1 style="color:blue;text-align:center">Login</h1>
    
    <?= $this->Form->create(false,array('name'=>'formLogin','onsubmit'=>'return checkInput(this)')) ;?>
      <div class="form-group">
      
        <label for="email">Email:</label>
        <?= $this->Form->input('email',array('class'=>'form-control','placeholder'=>'Email','type'=>'email','label'=>false,'required'=>false)) ?>

        <label for="pwd">Password:</label>
        <?= $this->Form->input('password',array('class'=>'form-control','placeholder'=>'Password','type'=>'password','label'=>false,'required'=>false)) ?>

      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
      <button style="float:left;margin-left:20px;" type="submit" class="btn btn-default">Login</button>
      <!-- <span class="icon-repeat icon-4x"> </span> -->
      </br></br>
     <?= $this->Flash->render() ?>
    <?= $this->Form->end() ?>
</div>

<script type=”text/javascript”>
  function checkInput(){
    if(document.formLogin.email.value==""){
        alter("Invalid email,please enter your own Email");
        document.formLogin.email.focus();
        return false;
    }
    if(document.formLogin.password.value==""){
        alter("Invalid password,please enter your own Password");
        document.formLogin.password.focus();
        return false;
    }
    return true;
  }
</script>



