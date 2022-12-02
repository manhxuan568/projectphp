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
        <h1 id="head-form">Login</h1>
        <form id="form-login" action="" method="POST">
            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="username"/>
            <?php echo form_error('username') ?>
            <input type="password" name="password" id="password" placeholder="password"/>
            <?php echo form_error('password') ?>
            <input type="checkbox" name="remenber_me" value="2" id="remenber-me" style="width: unset;">
            <label for="remenber_me">Ghi nhớ đăng nhập</label><br>
            <input type="submit" name="btn-login" value="Đăng nhập" id="btn-login"/>
            <?php
            form_error('account')
            ?>
            <a href="?mod=users&action=reset_pass" id="lost-pass">Quên mật khẩu?</a> 
             <!--<a href="?mod=users&action=reg" id="lost-pass">Đăng ký</a>-->
        </form>
        </div>
    </body>
</html>    