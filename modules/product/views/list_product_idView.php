<?php  get_header() ?>
<?php 


?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="Trang-chu" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo $cat_name['cat_name'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><strong><?php echo $cat_name['cat_name'] ?></strong></h3>
                    <div class="filter-wp fl-right">
<!--                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>-->
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php foreach ($list_product_by_id as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
<!--                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
        <?php get_sidebar() ?>
    </div>
</div>


<?php get_footer() ?>