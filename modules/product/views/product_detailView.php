<?php get_header()?>
<?php 
$list_pcat = db_fetch_array("SELECT * FROM `tbl_product_cat`");
$id = isset($_GET['id'])?(int)$_GET['id']:"";
$get_id_ra_dmuc_cha = db_fetch_row("SELECT `tbl_products`.*, `tbl_product_cat`.`cat_name` FROM `tbl_products` LEFT JOIN `tbl_product_cat` ON `tbl_products`.`product_type` = `tbl_product_cat`.`id` WHERE `tbl_products`.`id` = '{$id}'");
$get_id_ra_dmuc_con = db_fetch_row("SELECT `tbl_products`.*, `tbl_product_cat`.`cat_name` FROM `tbl_products` LEFT JOIN `tbl_product_cat` ON `tbl_products`.`cat_id` = `tbl_product_cat`.`id` WHERE `tbl_products`.`id` = '{$id}'");
?>

<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="Trang-chu" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=product&action=danh_muc&id=<?php echo $get_id_ra_dmuc_cha['product_type']?>" title=""><?php echo $get_id_ra_dmuc_cha['cat_name']?></a>
                    </li>
                    <li>
                        <a href="?mod=product&action=danh_muc&id=<?php echo $get_id_ra_dmuc_con['cat_id']?>" title=""><?php echo $get_id_ra_dmuc_con['cat_name']?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="admin/<?php echo $product_by_id['upload_file']?>"  data-zoom-image="admin/<?php echo $product_by_id['upload_file']?>"/>
                        </a>
                        <div id="list-thumb">
                            <a href="" data-image="admin/<?php echo $product_by_id['upload_file']?>" data-zoom-image="admin/<?php echo $product_by_id['upload_file']?>">
                                <img id="zoom" src="admin/<?php echo $product_by_id['upload_file']?>" />
                            </a>
<!--                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>-->
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="admin/<?php echo $product_by_id['upload_file']?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $product_by_id['p_name']?></h3>
                        <div class="desc">
                            <?php echo $product_by_id['product_desc']?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status"><?php echo $product_by_id['product']?></span>
                        </div>
                        <p class="price"><?php echo currency_format($product_by_id['price'])?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="?mod=cart&action=add&id=<?php echo $product_by_id['id'] ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                  <?php echo  $product_by_id['p_content'] ?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <?php if(!empty($list_product_co_lien_quan)){ ?>
                    <ul class="list-item">
                        <?php foreach($list_product_co_lien_quan as $v){ ?>
                        <li>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="><?php echo $v['p_name'] ?>" class="thumb">
                                <img src="admin/<?php echo $v['upload_file'] ?>">
                            </a>
                            <a href="San-pham/<?php echo $v['slug'] ?>-<?php echo $v['id'] ?>.html" title="><?php echo $v['p_name'] ?>" class="product-name"><?php echo $v['p_name'] ?></a>
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
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                     <?php echo render_menu($list_pcat,'list-item', 0, 0) ?>
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
    </div>
</div>
<?php get_footer() ?>