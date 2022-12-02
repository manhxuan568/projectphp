<?php


//show_array($list_users);
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <?php echo form_success('pages') ?>
              
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
             <?php if(!empty($update_info_page)) { ?>   
                <div class="section-detail">
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for="page_name">Tên trang</label>
                        <input type="text" name="page_name" id="page_name" value="<?php echo $update_info_page['page_name'] ?>">
                        <?php echo form_error('page_name') ?>
                        <label for="page_title">Tiêu đề trang</label>
                        <input type="text" name="page_title" id="page_title" value="<?php echo $update_info_page['page_title'] ?>">
                         <?php echo form_error('page_title') ?>
                        <label for="slug">Slug ( Friendly_url )</label>
                        <input type="text" name="slug_url" id="slug" value="<?php echo $update_info_page['slug_url'] ?>">
                        <?php echo form_error('slug_url') ?>
                        <label for="content">Nội dung trang</label>
                        <textarea name="content" id="content" class="ckeditor" style="width: 100%;"><?php echo $update_info_page['page_content'] ?></textarea>
                        <?php echo form_error('content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
<!--                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">-->
<!--                            <img src="public/images/img-thumb.png">-->
                        </div>
                        <?php echo form_error('file') ?>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
             <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
//            require "inc/footer.php";
get_footer();
?>
