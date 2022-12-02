<?php

function post_insert_into($data){
    return db_insert('tbl_posts', $data);
}

function post_cat_insert_into($data){
    return db_insert('tbl_posts_cat', $data);
}


function get_post($start = 1, $num_per_page = 10, $where = ""){
    if(!empty($where))
     $where = "WHERE $where";
    $result = db_fetch_array("SELECT `tbl_posts`.*, `tbl_posts_cat`.`cat_name` FROM `tbl_posts` LEFT JOIN `tbl_posts_cat` ON `tbl_posts`.`cat_id` = `tbl_posts_cat`.`cat_id` {$where} LIMIT {$start}, $num_per_page");
    return $result;  
}

function  update_post_status($data, $check){
    $item = db_update('tbl_posts', $data, "`id` = '{$check}'");
    return $item;
}
function  post_update_id($data, $id){
      return db_update('tbl_posts', $data, "`id` = '{$id}'");
}

function update_post($id){
    $item = db_fetch_row("SELECT* FROM `tbl_posts` WHERE `id` = '{$id}'");
    return $item;
}
function get_cat_post(){
    return db_fetch_array("SELECT* FROM `tbl_posts_cat`");
}

 function show_post_cat($id){
    return db_fetch_row("SELECT* FROM `tbl_posts_cat` WHERE `cat_id` = '{$id}'");
}
function  update_cat($data,$id){
    return db_update('tbl_posts_cat', $data, "`cat_id` = '{$id}'");
}