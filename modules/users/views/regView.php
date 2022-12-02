<?php

?>

<html>
    <head>
        <link rel="stylesheet" href="public/css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/login.css" type="text/css"/>
        <title>Form login hệ thống</title>
    </head>
    <body>
    <div id="wrapper">
        <h1 id="head-form">Đăng ký</h1>
        <form id="form-login" action="" method="POST">
            <input type="text" name="fullname" id="username" value="<?php echo set_value('fullname') ?>" placeholder="Họ và tên"/>
            <?php echo form_error('fullname') ?>
            <input type="email" name="email" id="username" value="<?php echo set_value('email') ?>" placeholder="Email"/>
             <?php echo form_error('email') ?>
            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Tên đăng nhập" autocomplete="false"/>
             <?php echo form_error('username') ?>
            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder="Mật khẩu" autocomplete="false"/>
             <?php echo form_error('password') ?>
            <input type="submit" name="btn-register" value="Đăng nhập" id="btn-login"/>
             <?php echo form_error('account') ?>
            <a id="lost-pass">Quên mật khẩu?</a>
        </form>
        </div>
    </body>
</html>

