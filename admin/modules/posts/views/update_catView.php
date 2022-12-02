<?php
$id = (int)$_GET['id'];
 $list_cat = get_cat_post();
$show_cat = show_post_cat($id);
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <?php if(!empty($_SESSION['update_cat'])){
                    echo "<h3 class='success'>".$_SESSION['update_cat']."</h3>";
                    unset($_SESSION['update_cat']);
                }
?>
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php if(!empty($list_cat)) { ?>
                    <form method="POST">
                        <label for="cat_name">Tên danh mục</label>
                        <input type="text" name="cat_name" id="cat_name" value="<?php echo $show_cat['cat_name'] ?>">
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $show_cat['slug'] ?>">
                        <button type="submit" name="btn-update-cat" id="btn-update-cat">Cập nhật</button>
                    </form>
                     <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
