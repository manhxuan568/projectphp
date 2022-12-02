

<?php get_header() ?>

<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass_old" id="pass-old">
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="new_pass" id="pass-new">
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm-pass">
                        <?php echo form_error('pass_old') ?>
                        <?php echo form_error('new_pass') ?>
                        <?php echo form_error('confirm_pass') ?>
                        <?php echo form_success('pass_new') ?>
                        <?php echo form_error('pass_old1') ?>
                        <?php echo form_error('confirm_pass_new') ?>
                        <button type="submit" name="btn-change-pass" id="btn-submit">Thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>