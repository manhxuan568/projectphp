<?php
$num_rows_pending = db_num_rows("SELECT* FROM `tbl_products` WHERE `status` = 'pending'");
$num_rows_public = db_num_rows("SELECT* FROM `tbl_products` WHERE `status` = 'public'");
$num_rows_trash = db_num_rows("SELECT* FROM `tbl_products` WHERE `status` = 'trash'");
//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=product&action=add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                     <form method="POST" action="" class="form-actions">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo $num_rows?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=product&action=list_product&status=public">Đã đăng <span class="count">(<?php echo $num_rows_public?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=product&action=list_product&status=pending">Chờ xét duyệt<span class="count">(<?php echo $num_rows_pending?>)</span> |</a></li>
                            <li class="pending"><a href="?mod=product&action=list_product&status=trash">Thùng rác<span class="count">(<?php echo $num_rows_trash?>)</span></a></li>
                        </ul>
                        <div class="form-s fl-right">
                        <!--<form method="GET" class="form-s fl-right">-->
                            <input type="text" name="s" id="s">
                            <input type="submit" name="search" value="Tìm kiếm">
                        <!--</form>-->
                        </div>
                    </div>
                    <!--m-->
                    <div class="actions">
                        <?php echo form_error('actions')?>
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <option value="public">Công khai</option>
                                <option value="pending">Chờ duyệt</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="btn_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <?php echo form_success('actions_p');
                            unset($_SESSION['actions_p']);
                        ?>
                        <table class="table list-table-wp">
                            <?php echo form_error('check')?>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $temp = $start;
                                    unset($item);
                                foreach($list_product as $item) {
                                    $temp++;
                                    ?>
                                <tr>
                                    <td><input type="checkbox" name="checklist[]" class="checkItem" value="<?php echo $item['id']?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $item['code'] ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item['upload_file'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $item['p_name'] ?>" title=""><?php echo $item['p_name'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=product&action=edit&id=<?php echo $item['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=product&action=delete&id=<?php echo $item['id'] ?>" title="Xóa" class="delete" onclick="alert('Bạn có muốn xóa vĩnh viễn sản phẩm này ?')"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo currency_format($item['price']) ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['cat_id'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['status'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['creator'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y",$item['created_date']) ?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Mã sản phẩm</span></td>
                                    <td><span class="tfoot-text">Hình ảnh</span></td>
                                    <td><span class="tfoot-text">Tên sản phẩm</span></td>
                                    <td><span class="tfoot-text">Giá</span></td>
                                    <td><span class="tfoot-text">Danh mục</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                  </form>    
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php echo pagging_lp($page, $num_page, "?mod=product&action=list_product")?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
