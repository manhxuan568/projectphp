<html>
    <head>
        <link rel="stylesheet" href="public/css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/login.css" type="text/css"/>
        <title>Form quên mật khẩu</title>
    </head>
    <body>
    <div id="wrapper">
        <h1 id="head-form">Quên mật khẩu</h1>
        <form id="form-login" action="" method="POST">
            <label for="username">Nhập email đã đăng ký tài khoản:</label><br>
            <input type="email" name="email" id="username" value="<?php echo set_value('email') ?>" placeholder="Nhập email tại đây"/>
            <?php echo form_error('email') ?>
            <input type="submit" name="btn-reset" value="Xác nhận" id="btn-login"/>
            <?php
           echo form_error('account');
            ?>
             <a href="?mod=users&action=login" id="lost-pass">Đăng nhập</a> 
             <!--<a href="?mod=users&action=reg" id="lost-pass">Đăng ký tài khoản mới</a>-->
        </form>
        </div>
    </body>
</html> 

