<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Admin</b> FINDJOB</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập findjob.vn</p>
        <?php echo $this->Flash->render();?>
        <?= $this->Form->create() ?>
        <div class="form-group has-feedback">
        <?= $this->Form->input('username', array(
            'label' => false,
            'templates' => [
                'inputContainer' => '{{content}}'
             ],
            'class'=> 'form-control',
            'placeholder' => 'Tài khoản',
            'required' => TRUE)) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <?= $this->Form->input('password', array(
            'label' => false,
            'templates' => [
                'inputContainer' => '{{content}}'
             ],
            'class'=> 'form-control',
            'placeholder' => 'Mật khẩu',
            'required' => TRUE)) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <?= $this->Form->button('Đăng nhập', array(
                    'class'=> 'btn btn-primary btn-block btn-flat')) ?>
                </div><!-- /.col -->
            </div>
        <?= $this->Form->end() ?>
        <a href="#">Quên mật khẩu</a><br>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->