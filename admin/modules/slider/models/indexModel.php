<?php

function slider_insert($data){
    return db_insert('tbl_slider', $data);
}

function get_slider(){
    return db_fetch_array("SELECT* FROM `tbl_slider`");
}

function edit_slider($id){
    return db_fetch_row("SELECT* FROM `tbl_slider` WHERE `id` = {$id}");
}
function  update_slider($data,$id){
    return db_update('tbl_slider', $data, "`id`= '{$id}'");
}

function delete_slider($id){
    return db_delete('tbl_slider', "`id` = '{$id}'");
}