<html>
    <head>
        <link rel="stylesheet" href="public/css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/login.css" type="text/css"/>
        <title>Thay đổi mật khẩu mới</title>
    </head>
    <body>
    <div id="wrapper">
        <form id="form-login" action="" method="POST">
            <h1 id="head-form">Nhập mật khẩu mới</h1>
            <!--<label for="password">Nhập mật khẩu mới:</label><br>-->
            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder=""/>
            <?php echo form_error('password') ?>
            <input type="submit" name="btn-new-pass" value="Lưu" id="btn-login"/>
            <?php
            form_error('account')
            ?>
<!--             <a href="?mod=users&action=login" id="lost-pass">Đăng nhập</a> |
             <a href="?mod=users&action=reg" id="lost-pass">Đăng ký tài khoản mới</a>-->
        </form>
        </div>
    </body>
</html> 


