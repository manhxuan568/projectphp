<?php get_header() ?>
<?php $num_product_total =num_product_total() ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="Trang-chu" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php if(!empty($search_filter)) echo "Tìm kiếm từ khóa: <strong style='color:#000'>'' {$key_word} ''</strong>"."<p style='text-transform: none;font-size:14px;'>có {$num_product_keyword} sản phẩm.</p>"; ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc"><?php if(!empty($search_filter)) echo "Hiển thị {$num_product_keyword} trên {$num_product_total} sản phẩm"  ?></p>
                        <div class="form-filter">
<!--                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>-->
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <?php echo form_error("search"); ?>
                    <?php if(!empty($search_filter)) { ?>
                    <ul class="list-item clearfix">
                       <?php foreach ($search_filter as $item) {?>
                        <li>
                            <a href="?mod=product&action=product_detail&id=<?php echo $item['id'] ?>" title="" class="thumb">
                                <img src="admin/<?php echo $item['upload_file']?>">
                            </a>
                            <a href="?mod=product&action=product_detail&id=<?php echo $item['id'] ?>" title="" class="product-name"><?php echo $item['p_name']?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'])?></span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                       <?php } ?>
                    </ul>
                     <?php } ?>
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
        <?php get_sidebar('home') ?>
    </div>
</div>
<?php get_footer() ?>