<?php
 $list_cat = get_cat_post();
//     show_array($list_cat);
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <?php if(!empty($_SESSION['cat_name'])){
                    echo "<h3 class='success'>".$_SESSION['cat_name']."</h3>";
                    unset($_SESSION['cat_name']);
                }
?>
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name">
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label>Danh mục đã có:</label>
                        <?php if(!empty($list_cat)) { ?>
                        <select>
                            <option>Danh mục</option>
                            <?php  foreach ($list_cat as $item) { ?>
                            <option><?php echo $item['cat_name'] ?></option>
                            <?php } ?>
                        </select>
                         <?php } ?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
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
