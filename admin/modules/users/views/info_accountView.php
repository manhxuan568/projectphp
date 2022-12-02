<?php get_header() ?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add_users" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
       <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo $info_user['fullname'] ?>">
                        <?php echo form_error('fullname') ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="<?php echo $info_user['username'] ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email'] ?>" readonly="readonly">
                         <?php echo form_error('email') ?>      
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="number_phone" id="tel" value="<?php echo $info_user['number_phone'] ?>">
                        <?php echo form_error('number_phone') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_user['address'] ?></textarea>
                        <?php echo form_error('address') ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                        <?php if(!empty($update_success)) echo $update_success ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>

