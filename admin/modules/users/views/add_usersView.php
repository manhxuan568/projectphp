<?php get_header() ?>

<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add_users" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm tài khoản mới</h3>
        </div>
    </div>
    <div class="wrap clearfix">
       <?php get_sidebar('users') ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php echo form_success('add_user');  
                        unset($_SESSION['add_user']);
                    ?>
                    <form action="" method="POST">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" id="display-name">
                        <?php echo form_error('fullname') ?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="Admin">
                         <?php echo form_error('username') ?>
                        <label for="password">Tạo mật khẩu</label>
                        <input type="password" name="password" id="password" placeholder="Admin">
                         <?php echo form_error('password') ?>
                        <label>Quyền quản lý</label>
                        <?php echo form_error('permission') ?>
                         <select name="permission">
                            <option value="">-- Chọn quyền quản lý --</option>
                            <option value="all">Admin quyền cao nhất</option>
                            <option value="page_post">Quản lý trang, bài viết</option>
                            <option value="product_sale">Quản lý sản phẩm, bán hàng</option>
                         </select> 
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                         <?php echo form_error('email') ?>      
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="number_phone" id="tel" >
                        <?php echo form_error('number_phone') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"></textarea>
                        <?php echo form_error('address') ?>
                        <button type="submit" name="btn-add-user" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer() ?>