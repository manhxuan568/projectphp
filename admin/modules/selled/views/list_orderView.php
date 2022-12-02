<?php
$num_rows_pending = db_num_rows("SELECT* FROM `tbl_orders` WHERE `status_order` = 'pending'");
$num_rows_success = db_num_rows("SELECT* FROM `tbl_orders` WHERE `status_order` = 'success'");
$num_rows_shipping = db_num_rows("SELECT* FROM `tbl_orders` WHERE `status_order` = 'shipping'");
$num_rows_cancel = db_num_rows("SELECT* FROM `tbl_orders` WHERE `status_order` = 'cancel'");
?>
<?php

//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo $num_rows?>)</span></a> |</li>
                            <li class="publish"><a href="">Đơn thành công<span class="count">(<?php echo $num_rows_success?>)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xử lý<span class="count">(<?php echo $num_rows_pending?>)</span> |</a></li>
                            <li class="pending"><a href="">Đang vận chuyển<span class="count">(<?php echo $num_rows_shipping?>)</span></a></li>
                            <li class="pending"><a href="">Đơn bị hủy<span class="count">(<?php echo $num_rows_cancel?>)</span></a></li>
                            
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                   <form method="POST" action="" class="form-actions">
                        <?php echo form_error("status")?>
                    <div class="actions">
                            <select name="status">
                                <option value="">Tác vụ</option>
                                <option value="pending">Chờ duyệt dơn</option>
                                <option value="shipping">Đang vận chuyển</option>
                                <option value="success">Đơn thành công</option>
                                <option value="cancel">Các đơn bị hủy</option>
                            </select>
                            <input type="submit" name="btn_status" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <?php echo form_success("success");
                                unset($_SESSION['success']);   
                        ?>
                        <?php echo form_error("checkItem")?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $temp = $start;
                                foreach ($list_order as $v) { 
                                    $temp++;
                                    ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $v['order_id']?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $v['code_orders']?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="?mod=selled&action=detail_order&order_id=<?php echo $v['order_id']?>" title="Xem đơn hàng"><?php echo $v['fullname']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <!--<li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>-->
                                            <li><a href="?mod=selled&action=delete&order_id=<?php echo $v['order_id']?>" title="Xóa vĩnh viễn" class="delete" onclick="alert('Xóa đơn hàng vĩnh viễn')"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $v['num_order']?></span></td>
                                    <td><span class="tbody-text"><?php echo currency_format($v['total_order'])?></span></td>
                                    <td><span class="tbody-text"><?php echo $v['status_order']?></span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y h:m:s" ,$v['created_date'])?></span></td>
                                    <td><a href="?mod=selled&action=detail_order&order_id=<?php echo $v['order_id']?>" title="Chi tiết đơn hàng" class="tbody-text">Chi tiết</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Mã đơn hàng</span></td>
                                    <td><span class="tfoot-text">Họ và tên</span></td>
                                    <td><span class="tfoot-text">Số sản phẩm</span></td>
                                    <td><span class="tfoot-text">Tổng giá</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Chi tiết</span></td>
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
                     <?php echo pagging_lp($page,$num_page,"?mod=selled&action=list_order")?>
<!--                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
