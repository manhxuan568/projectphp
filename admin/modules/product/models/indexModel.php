<?php
//product_cat
function product_insert_cat($data){
   return db_insert('tbl_product_cat', $data);
}

function get_cat(){
    return db_fetch_array("SELECT* FROM `tbl_product_cat`");
}
function get_rows_cat($id){
    return db_fetch_row("SELECT* FROM `tbl_product_cat` WHERE `id` = '{$id}'");
}

function  edit_cat($data,$id){
   $item = db_update('tbl_product_cat', $data, "`id` = '{$id}'"); 
   return $item;
}

function delete_cat($id){
    $item = db_delete('tbl_product_cat', "`id` = '{$id}'");
    return $item;
}
//product
function product_insert($data){
   return db_insert('tbl_products', $data);
}

function get_list_product($start,$num_per_page, $where = ""){
    if(!empty($where))
    $where = "WHERE $where";
    $result = db_fetch_array("SELECT* FROM `tbl_products` {$where} LIMIT {$start},$num_per_page");
    return $result;
}

function get_product_type(){
    return db_fetch_array("SELECT* FROM `tbl_product_cat` WHERE `parent_id` = '0'");
}

function get_product($id){
    return db_fetch_row("SELECT* FROM `tbl_products` WHERE `id` = '{$id}'");
}

function update_status_p($data, $check){
     $item = db_update('tbl_products', $data, "`id` = '{$check}'"); 
      return $item;
}

function  edit_product($data,$id){
   $item = db_update('tbl_products', $data, "`id` = '{$id}'"); 
   return $item;
}

function delete_product($id){
    $item = db_delete('tbl_products', "`id` = '{$id}'");
    return $item;
}