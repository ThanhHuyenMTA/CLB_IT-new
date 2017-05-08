<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <?php echo $this->Html->css('Admin.bootstrap.min.css'); ?>
        <!-- Font Awesome -->
        <?php echo $this->Html->css('font-awesome.min.css'); ?>
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <!-- Theme style -->
        <?php echo $this->Html->css('Admin.dist/css/AdminLTE.min.css'); ?>
        <!-- iCheck -->
        <?php echo $this->Html->css('Admin.blue.css'); ?>
        <!--<link rel="stylesheet" href="<?php //echo $this->basePath(); ?>/plugins/iCheck/square/blue.css">-->
        <?php echo $this->Html->css('Admin.style.admin.css'); ?>
    </head>
    <body class="hold-transition login-page">
        <?php echo $this->fetch('content');?>

        <?php echo $this->Html->script('Admin.jQuery-2.1.4.min.js'); ?>
        <?php echo $this->Html->script('Admin.bootstrap.min.js'); ?>
        <?php echo $this->Html->script('Admin.icheck.min.js'); ?>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
