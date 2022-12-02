<?php

function get_list_slider() {
    $result = db_fetch_array("SELECT * FROM `tbl_slider`");
    return $result;
}

function featured_products(){
    return db_fetch_array("SELECT * FROM `tbl_products` LIMIT 5,6");
}

function get_product_by_id($id=""){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_type` = '{$id}'");
}

function get_Catname_by_id($id=""){
    return db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id` = '{$id}'");
}