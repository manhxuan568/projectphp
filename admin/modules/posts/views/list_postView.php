<?php

//show_array($list_post);
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=posts&action=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=posts">Tất cả <span class="count">(<?php echo $num_rows ?>)</span></a> |</li>
                            <li class="public"><a href="?mod=posts&status=public">Công khai<span class="count">(<?php echo $num_rows_public ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=posts&status=pending">Chờ xét duyệt <span class="count">(<?php echo $num_rows_pending ?>)</span></a></li>
                            <li class="trash"><a href="?mod=posts&status=trash">Bỏ vào thùng rác <span class="count">(<?php echo $num_rows_trash ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search_info_table" id="s" placeholder="Tìm danh mục...">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                  <form  action="" method="POST" class="form-actions">  
                    <div class="actions">
                        <?php echo form_error('actions') ?>
                            <select name="actions">
                                <option value="">--Tác vụ--</option>
                                <option value="pending">Chờ duyệt bài</option>
                                <option value="public">Công khai</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="btn_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <?php echo form_success('update_status') ?>
                             <?php echo form_error('check') ?>
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($list_post)) { 
                                $temp = $start;
                                ?>
                            <tbody>
                              <?php  foreach ($list_post as $item) { 
                                  $temp++;
                                  ?>
                                <tr>
                                    <td><input type="checkbox" name="check[]" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $item['post_title'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=posts&action=update&id=<?php echo $item['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=posts&action=delete&id=<?php echo $item['id'] ?>" title="Xóa vĩnh viễn" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['cat_name'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['status'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['creator'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo date("d/m/Y", $item['created_date']) ?></span></td>
                                </tr>
                               <?php } ?>  
                            </tbody>
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tiêu đề</span></td>
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
                    <?php  echo get_pagging($num_page, $page, "?mod=posts") ?>
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
