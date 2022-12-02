<?php 
get_header() ?>
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
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
       <?php if(empty($get_page)) echo $error; ?>
        
       <?php if(!empty($get_page) ) { ?> 
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Sản phẩm</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo $products_by_cid_price ?> trên <?php echo $num_total_products ?> sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select onchange="this.options[this.selectedIndex].value &&(window.location = this.options[this.selectedIndex].value);">
                                    <option value="">Sắp xếp</option>
                                    <option value="?mod=product&action=category_product<?php echo $parem_price.$parem_pcat ?>&field=p_name&sort=asc">Từ A-Z</option>
                                    <option value="?mod=product&action=category_product<?php echo $parem_price.$parem_pcat ?>&field=p_name&sort=desc">Từ Z-A</option>
                                    <option value="?mod=product&action=category_product<?php echo $parem_price.$parem_pcat ?>&field=price&sort=asc">Giá thấp lên cao</option>
                                    <option value="?mod=product&action=category_product<?php echo $parem_price.$parem_pcat ?>&field=price&sort=desc">Giá cao xuống thấp</option>
                                </select>
                                <!--<button type="submit" name="btn-sort">Lọc</button>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                      <?php foreach ($get_page as $item){ ?>
                        <li>
                            <a href="San-pham/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="" class="thumb">
                                <img src="admin/<?php echo $item['upload_file'] ?>">
                            </a>
                            <div class="p-name-client">
                                <a href="San-pham/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="" class="product-name" style="display: contents;"><?php echo $item['p_name'] ?></a>
                            </div>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price']) ?></span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="them-san-pham/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="buy-now/<?php echo $item['slug'] ?>-<?php echo $item['id'] ?>.html" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                      <?php } ?>   
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <!--<ul class="list-item clearfix">-->
                       <?php echo get_pagging($num_page,$page, "?mod=product&action=category_product", $parem, $parem_pcat, $parem_price) ?>
                    <!--</ul>-->
                </div>
            </div>
        </div>
      <?php } ?>  
     <?php get_sidebar() ?>
    </div>
</div>
<?php get_footer() ?>