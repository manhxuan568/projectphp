<?php
//Phần msql bảng tbl_product_cat

function get_list_product_by_cat() {
    $result = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    return $result;
}
function get_cat_name_id($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id` = '{$id}'");
    return $result;
}



//Phần msql bảng tbl_products

function get_list_product() {
    $result = db_fetch_array("SELECT * FROM `tbl_products`");
    return $result;
}


function get_page($orderCondion , $start = 1, $num_per_page = 10,$where= ""){  //
    if(!empty($where))
    $where = "WHERE {$where}";
return db_fetch_array("SELECT* FROM `tbl_products` {$where} {$orderCondion}  LIMIT {$start}, $num_per_page");

}

function num_total_products(){
    $result = db_num_rows("SELECT * FROM `tbl_products`"); //LIMIT 4 là giới hạn lấy được 4 sản phẩm
    return $result;
}

function total_products_by_cid_price($where = ""){
    if(!empty($where))
    $where = "WHERE {$where}";
    $result = db_num_rows("SELECT * FROM `tbl_products` {$where}"); //LIMIT 4 là giới hạn lấy được 4 sản phẩm
    return $result;
}

function get_list_product_by_loai($get_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_type` = '{$get_id}'");
}
function get_list_product_by_line($get_id){
    return db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = '{$get_id}'");
}

function get_product_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = '{$id}'");
}

//lối bảng với lert join 
function get_list_product_by_hang($get_id){
    return db_fetch_array("SELECT `tbl_products`.*, `tbl_product_cat`.`parent_id` FROM `tbl_products` LEFT JOIN `tbl_product_cat` ON `tbl_products`.`cat_id` = `tbl_product_cat`.`id` WHERE `tbl_product_cat`.`parent_id` = '{$get_id}'");
}

