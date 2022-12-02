<?php
$list_slider = get_slider();
//show_array($list_users);
get_header();
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span></a></li>
                            <li class="pending"><a href="">Thùng rác<span class="count">(0)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                   <form method="POST" action="" class="form-actions">  
                    <div class="actions">
                        <?php echo form_success('slider_up'); 
                         unset($_SESSION['slider_up']); ?>
                        <?php echo form_error('actions') ?>
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <option value="public">Công khai</option>
                                <option value="pending">Chờ duyệt</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <?php echo form_error('checkitem') ?>
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $temp = 0;
                                foreach($list_slider as $item) { 
                                    $temp++;
                                    ?>
                                <tr>
                                    <td><input type="checkbox" name="checkitem[]" class="checkItem" value="<?php echo $item['id']?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item['file_img']?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item['link']?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=slider&action=edit&id=<?php echo $item['id']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=slider&action=delete&id=<?php echo $item['id']?>" title="Xóa vĩnh viễn" class="delete" onclick="alert('Bạn có chắc muốn xóa vĩnh viễn không?')"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['num_order']?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['status']?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['creator']?></span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y",$item['created_date'])?></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Hình ảnh</span></td>
                                    <td><span class="tfoot-text">Link</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
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
                    <ul id="list-paging" class="fl-right">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
