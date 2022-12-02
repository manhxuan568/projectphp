<?php

function get_list_order($start = 1, $num_per_page = 10, $where = "") {
    if(!empty($where))
    $where = "WHERE $where";
    $result = db_fetch_array("SELECT* FROM `tbl_orders` {$where} ORDER BY `tbl_orders`.`order_id` DESC LIMIT {$start},$num_per_page");
    return $result;
}

function  update_status_order($data, $v){
    return db_update('tbl_orders', $data, "`order_id` = '{$v}'");
}

function get_detail_order_by($id){
    $resurt = db_fetch_row("SELECT* FROM `tbl_orders` WHERE `order_id` = '{$id}'");
    return $resurt;
}

function delete_order($id){
    return db_delete('tbl_orders', "`order_id` = '{$id}'");
}

function delete_action($id){
    return db_delete('tbl_orders', "`order_id` = '{$id}'");
}