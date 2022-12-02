<?php

function get_list_blog(){
    $result = db_fetch_array("SELECT* FROM `tbl_posts`");
    return $result;
}
function get_post_detail_by_id($id){
    return db_fetch_row("SELECT* FROM `tbl_posts` WHERE `id` = '{$id}'");
}