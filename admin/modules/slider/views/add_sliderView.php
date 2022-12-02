<?php

//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <?php echo form_success('slider');
                unset($_SESSION['slider']); ?>
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for="title">Tên slider</label>
                        <?php echo form_error('slider') ?>
                        <input type="text" name="slider" id="title">
                        <label for="title">Link</label>
                        <?php echo form_error('slug') ?>
                        <input type="text" name="slug" id="slug">
                        <label for="title">Thứ tự</label>
                        <?php echo form_error('num_order') ?>
                        <input type="text" name="num_order" id="num-order">
                        <label>Hình ảnh</label>
                        <?php echo form_error('type') ?>
                        <?php echo form_error('file_size') ?>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                        </div>
                        <label>Trạng thái</label>
                        <?php echo form_error('status') ?>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="public">Công khai</option>
                            <option value="pending">Chờ duyệt</option>
                        </select>
                        <button type="submit" name="btn-add-slider" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
