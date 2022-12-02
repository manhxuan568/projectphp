<?php 
$list_cat = db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `parent_id` = '0'");
$list_pcat = db_fetch_array("SELECT * FROM `tbl_product_cat`");
 ?>

<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title" >Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <?php echo render_menu($list_pcat,'list-item', 0, 0) ?>
<!--                    <ul class="list-item">
                         
                        <li>
                            <a href="?mod=product&action=category_phone&id=" title=""></a>
                            
                            <ul class="sub-menu">
                                
                                <li>
                                    <a href="?page=category_product" title="">Iphone</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Samsung</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="?page=category_product" title="">Iphone X</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Iphone 8</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Oppo</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Bphone</a>
                                </li>
                            </ul>
                        </li>
                       
                        <li>
                            <a href="?page=category_product" title="">Máy tính bảng</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">laptop</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Tai nghe</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Thời trang</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Đồ gia dụng</a>
                        </li>
                        <li>
                            <a href="?page=category_product" title="">Thiết bị văn phòng</a>
                        </li>
                    </ul>-->
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio"  name="price" class="filter price" <?php if(isset($_GET['price']) && $_GET['price'] == '500000') { ?>checked<?php } ?> value="500000"></td>
                                    <td>Dưới 500.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="price" class="filter price" <?php if(isset($_GET['price']) && $_GET['price'] == '1000000') { ?>checked<?php } ?> value="1000000"></td>
                                    <td>Dưới 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="price" class="filter price" <?php if(isset($_GET['price']) && $_GET['price'] == '5000000') { ?>checked<?php } ?> value="5000000"></td>
                                    <td>Trong tầm 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio"  name="price" class="filter price" <?php if(isset($_GET['price']) && $_GET['price'] == '10000000') { ?>checked<?php } ?> value="10000000"></td>
                                    <td>Dưới 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="price" class="filter price" <?php if(isset($_GET['price']) && $_GET['price'] == '10000001') { ?>checked<?php } ?> value="10000001"></td>
                                    <td>Trên 10.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
<!--                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Acer</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Apple</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Hp</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Lenovo</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Samsung</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Toshiba</td>
                                </tr>
                            </tbody>
                        </table>-->
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_cat as $item) { ?>
                                <tr>
                                    <td><input type="radio" class="filter productCat" name="productCat" <?php if(isset($_GET['productCat']) && $_GET['productCat'] == "{$item['id']}") { ?>checked<?php } ?> value="<?php echo $item['id'] ?>"></td>
                                    <td><?php echo $item['cat_name'] ?></td>
                                </tr>
                                <?php } ?>
<!--                                <tr>
                                    <td><input type="radio" class="filter productCat" name="productCat"></td>
                                    <td>Laptop</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="filter productCat" name="productCat"></td>
                                    <td>Máy tính bảng</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" class="filter productCat" name="productCat"></td>
                                    <td>Phụ kiện</td>-->
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>