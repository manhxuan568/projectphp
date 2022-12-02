<?php 
$get_featured_products = db_fetch_array("SELECT * FROM `tbl_products` LIMIT 5,6");
$list_pcat = db_fetch_array("SELECT * FROM `tbl_product_cat`");
?>

<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                     <?php echo render_menu($list_pcat,'list-item', 0, 0) ?>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php  foreach ($get_featured_products as $v) { ?>
                        <li class="clearfix">
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb fl-left">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <div class="info fl-right">
                                <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($v['price']) ?></span>
                                    <span class="old">7.190.000đ</span>
                                </div>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="Mua ngay" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>