<?php


function add_insert_page($data){
   $result = db_insert('tbl_pages', $data);
   return $result;
}

function get_pages($start= 1, $num_per_page= 10, $where= "") {
    if(!empty($where))
        $where = "WHERE $where";
    $resurt = db_fetch_array("SELECT* FROM `tbl_pages`  {$where} LIMIT {$start}, $num_per_page");
     return $resurt;
}

function delete_page($page_id){
   return db_delete('tbl_pages', "`id` = '{$page_id}'"); 
}

function get_page_by_id($page_id){
   $item =  db_fetch_row("SELECT * FROM `tbl_pages` WHERE `id` = '{$page_id}'");
   return $item;
}

function  update_page($data, $page_id){
    $item = db_update('tbl_pages', $data, "`id` = '{$page_id}'");
    return $item;
}

function update_status($data, $cat){
    return db_update('tbl_pages', $data, "`id` = '{$cat}'");
}