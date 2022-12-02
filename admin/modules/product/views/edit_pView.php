<?php
$id = (int)$_GET['id'];
$get_product = get_product($id);
$list_cat = data_tree(get_cat(), 0);
//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
             <?php echo form_success('product_edit');
                   unset($_SESSION['product_edit']);
             ?>
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for="product-name">Tên sản phẩm</label>
                        <?php echo form_error('p_name') ?>
                        <input type="text" name="p_name" id="product-name" value="<?php echo $get_product['p_name']?>">
                        <label for="slug">Slug (Friendly Link)</label>
                        <?php echo form_error('slug') ?>
                        <input type="text" name="slug" id="slug" value="<?php echo $get_product['slug']?>">
                        <label for="product-code">Mã sản phẩm</label>
                        <?php echo form_error('code') ?>
                        <input type="text" name="code" id="product-code" value="<?php echo $get_product['code']?>">
                        <label for="price">Giá sản phẩm</label>
                        <?php echo form_error('price') ?>
                        <input type="text" name="price" id="price" value="<?php echo $get_product['price']?>">
                        <label for="leftover_product">Số sản phẩm còn trong kho</label>
                        <?php echo form_error('leftover_p') ?>
                        <input type="text" name="leftover_product" id="price" value="<?php echo $get_product['leftover_product']?>">
                        <label for="desc">Mô tả ngắn</label>
                        <?php echo form_error('desc') ?>
                        <textarea name="desc" id="desc" class="ckeditor"><?php echo $get_product['product_desc']?></textarea>
                        <label for="desc">Chi tiết sản phẩm</label>
                        <?php echo form_error('content') ?>
                        <textarea name="content" id="desc" class="ckeditor"><?php echo $get_product['p_content']?></textarea>
                        <label>Hình ảnh</label>
                        <?php echo form_error('type') ?>
                        <?php echo form_error('file_size') ?>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" title="Chọn tệp" value="<?php echo $get_product['upload_file']?>">
<!--                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">-->
                        </div>
                        <label>Danh mục sản phẩm</label>
                         <?php echo form_error('parent_id') ?>
                        <select name="parent_id">
                            <option value=""><--Chọn danh mục cho sản phẩm--></option>
                            <option value="0">-- Tạo danh mục cha --</option>
                            <?php foreach ($list_cat as $item){ ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo str_repeat("--", $item['level']).$item['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                        <label>Trạng thái</label>
                         <?php echo form_error('status') ?>
                        <select name="status">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="pending">Chờ duyệt</option>
                            <option value="public">Đã đăng</option>
                        </select>
                        <button type="submit" name="btn_edit_product" id="btn-submit">Cập nhật</button>
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
