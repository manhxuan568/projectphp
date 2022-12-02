<?php 
$list_cat = data_tree(get_cat(), 0);

get_header() ;

?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <?php echo form_success('add_cat_product');
                         unset($_SESSION['add_cat_product']);               
                ?>
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="cat-title" id="title">
                        <?php echo form_error('cat-title') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <?php echo form_error('slug') ?>
                        <label>Danh mục cha</label>
                        <select name="parent_id">
                            <option value="0">-- Đây là danh mục cha --</option>
                            <?php foreach($list_cat as $item) { ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo str_repeat("--", $item['level']).$item['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('parent_id') ?>
                        <button type="submit" name="btn-add-cat" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
