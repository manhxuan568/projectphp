<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
<?php get_sidebar() ?>
        <div id="content" class="fl-right"> 
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?mod=page&action=add_page" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=page">Tất cả <span class="count">(<?php echo $num_rows ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=page&status=public">Đã đăng <span class="count">(<?php echo $num_rows_public ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=page&status=pending">Chờ xét duyệt <span class="count">(<?php echo $num_rows_pending ?>)</span> |</a></li>
                            <li class="trash"><a href="?mod=page&status=trash">Thùng rác <span class="count">(<?php echo $num_rows_trash ?>)</span></a></li>
                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="find_page" id="s" placeholder="Tìm danh mục...">
                            <input type="submit" name="search_page" value="Tìm kiếm">
                        </form>
                    </div>
                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions">
                                <option value="">--Tác vụ--</option>
                                <option value="pending">Chờ duyệt</option>
                                <option value="public">Công khai</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="btn_action" value="Áp dụng">
                        </div>
                        <?php echo form_error('cat') ?>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên trang</span></td>
                                        <td><span class="thead-text">Tiêu đề trang</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                </thead>
                                        <?php
                                        if (!empty($list_pages)) {
                                            $temp = $start;
                                            ?>
                                    <tbody>

                                        <?php
                                        foreach ($list_pages as $item) {
                                            $temp++
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="cat" value="<?php echo $item['id'] ?>" class="checkItem"></td>
                                                <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                                <td class="clearfix">
                                                    <div class="tb-title fl-left">
                                                        <a href="" title=""><?php echo $item['page_name'] ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="?mod=page&action=update&page_id=<?php echo $item['id'] ?>&page_current=1" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="?mod=page&action=delete&page_id=<?php echo $item['id'] ?>&page_current=1" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['page_title'] ?></span></td>
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
                                        <td><span class="tfoot-text">Tên trang</span></td>
                                        <td><span class="tfoot-text">Tiêu đề trang</span></td>
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
                    <?php echo get_pagging($num_page, $page, "?mod=page") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
