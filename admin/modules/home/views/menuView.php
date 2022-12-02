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
                    <p>Chào bạn <strong><?php echo user_login()?></strong> bắt đầu làm việc thôi. Chúc bạn một ngày tốt lành.</p>
<!--                    <h3 id="index" class="fl-left">Danh sách khối</h3>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//            require "inc/footer.php";
get_footer();
?>
