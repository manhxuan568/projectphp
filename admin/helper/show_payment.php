<?php
function show_payment($category){
    $list_category = array(
        '1'=> 'Thanh toán tại của hàng',
        '2'=> 'Thanh toán tại nhà',
    );
    if(array_key_exists($category, $list_category)){
        return $list_category[$category];
    }
}