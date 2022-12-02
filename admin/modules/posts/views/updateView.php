<?php
$list_cat = get_cat_post();
//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
             <?php echo form_success('update') ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo $update_post['post_title'] ?>">
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $update_post['slug_url'] ?>">
                        <label for="desc">Đoạn mô tả</label>
                        <textarea name="desc" id="desc" class="ckeditor"><?php echo $update_post['post_desc'] ?></textarea>
                        <label for="content">Nội dung chính</label>
                        <textarea name="content" id="content" class="ckeditor"><?php echo $update_post['post_content'] ?></textarea>
                        <label>File ảnh của bài</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
<!--                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">-->
                            <?php echo form_error('type') ?>
                            <?php echo form_error('file_size') ?>
                        </div>
                        <label>Danh mục</label>
                        <select name="category">
                            <option value="">-- Chọn danh mục --</option>
                            <?php foreach ($list_cat as $item) { ?>
                            <option value="<?php echo $item['cat_id']?>"><?php echo $item['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('category') ?>
                        <button type="submit" name="btn-update" id="btn-submit">Thêm bài viết</button>
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