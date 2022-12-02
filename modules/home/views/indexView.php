<?php
//slider
$list_slider = get_list_slider();
//product_by_type
$get_featured_products = featured_products();
$list_mobile = get_product_by_id(18);
$list_laptop = get_product_by_id(19);
$list_tablet = get_product_by_id(21);
$list_accessory = get_product_by_id(29);
//Cat_name
$Cat_mobile = get_Catname_by_id(18);
$Cat_laptop = get_Catname_by_id(19);
$Cat_tablet = get_Catname_by_id(21);
$Cat_accessory = get_Catname_by_id(29);

?>
<?php get_header(); ?> 
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php foreach($list_slider as $item) { ?>
                    <div class="item">
                        <img src="admin/<?php echo $item['file_img']?>" alt="">
                    </div>
                    <?php } ?>
<!--                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>-->
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php  foreach ($get_featured_products as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $Cat_mobile['cat_name'] ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php  foreach ($list_mobile as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $Cat_laptop['cat_name'] ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php  foreach ($list_laptop as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $Cat_tablet['cat_name'] ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php  foreach ($list_tablet as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $Cat_accessory['cat_name'] ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php  foreach ($list_accessory as $v) { ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="product-name"><?php echo $v['p_name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($v['price']) ?></span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php get_sidebar('home'); ?>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
