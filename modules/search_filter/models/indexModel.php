<?php
function get_by_search($search){
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `p_name` LIKE '%".$search."%' ORDER BY id DESC "); //LIMIT 4 là giới hạn lấy được 4 sản phẩm
    return $result;
}

function num_product_keyword($search){
    $result = db_num_rows("SELECT * FROM `tbl_products` WHERE `p_name` LIKE '%".$search."%'"); //LIMIT 4 là giới hạn lấy được 4 sản phẩm
    return $result;
}
function num_product_total(){
    $result = db_num_rows("SELECT * FROM `tbl_products`"); //LIMIT 4 là giới hạn lấy được 4 sản phẩm
    return $result;
}