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
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <form method="POST" action="" class="form-actions">
                    <div class="actions">
                        <?php echo form_error("actions")?>
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <option value="delete">Xóa vĩnh viễn</option>
                            </select>
                            <input type="submit" name="tbn_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <?php echo form_error("checkItem")?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $temp = $start; foreach ($list_customer as $v){ $temp++?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $v['order_id'] ?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="?mod=selled&action=detail_order&order_id=<?php echo $v['order_id'] ?>" title=""><?php echo $v['fullname'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <!--<li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>-->
                                            <li><a href="?mod=selled&action=delete_customer&order_id=<?php echo $v['order_id'] ?>" title="Xóa vĩnh viễn" class="delete" onclick="alert('Xóa một khách hàng trong hệ thống vĩnh viễn')"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $v['phone_number'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $v['email'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $v['address'] ?></span></td>
                                    <td><span class="tbody-text">1</span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y h:m:s",$v['created_date']) ?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-body">STT</span></td>
                                    <td><span class="tfoot-body">Họ và tên</span></td>
                                    <td><span class="tfoot-body">Số điện thoại</span></td>
                                    <td><span class="tfoot-body">Email</span></td>
                                    <td><span class="tfoot-body">Địa chỉ</span></td>
                                    <td><span class="tfoot-body">Đơn hàng</span></td>
                                    <td><span class="tfoot-body">Thời gian</span></td>
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
                      <?php echo pagging_lp($page,$num_page,"?mod=selled&action=list_customer") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
