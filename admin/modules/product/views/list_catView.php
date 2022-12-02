<?php
$list_cat = data_tree(get_cat(), 0);
//show_array($get_cat);
get_header();
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=product&action=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
<!--                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>-->
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Tác vụ</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                  $temp = 0;
                                  unset($item);
                                foreach($list_cat as $item) { 
                                    $temp++;
                                    ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo str_repeat("--", $item['level']).$item['cat_name']?></a>
                                        </div> 
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['creator']?></span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y",$item['created_date'])?></span></td>
                                    <td>
                                        <ul class="list-operation list-operation-cat fl-right">
                                            <li><a href="?mod=product&action=edit_cat&id=<?php echo $item['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=product&action=delete_cat&id=<?php echo $item['id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Danh mục</span></td>
<!--                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>-->
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Tác vụ</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
<!--            <div class="section" id="paging-wp">
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
            </div>-->
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
