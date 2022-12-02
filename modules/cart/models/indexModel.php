<?php


function get_product_by_id($id){
    return db_fetch_row("SELECT* FROM `tbl_products` WHERE `id` = '{$id}'");
}

function insert_into_order($data){
    return db_insert('tbl_orders', $data);
}

