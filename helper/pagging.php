<?php

function get_pagging($num_page, $page, $base_url = "", $parem_price, $parem_pcat, $parem){
    $str_pagging = "<ul class='pagging' style = 'margin-right:30%'>";
    if($page > 1){
        $page_prev = $page -1;
        $str_pagging.= "<li><a href=\"{$base_url}{$parem_price}{$parem_pcat}{$parem}&page={$page_prev}\"><<</a></li>";
    }
    
    for($i = 1; $i <= $num_page; $i++){
         $active = "";
        if($i == $page) $active = "class='active'";
       $str_pagging.= "<li {$active}><a href=\"{$base_url}{$parem_price}{$parem_pcat}{$parem}&page={$i}\">{$i}</a></li>"; 
    }
    
    if($page < $num_page){
        $page_next = $page + 1;
        $str_pagging.= "<li><a href=\"{$base_url}{$parem_price}{$parem_pcat}{$parem}&page={$page_next}\">>></a></li>";
    }
     $str_pagging .= "</ul>";
    return $str_pagging;
}

function content($list_cart,$total_order){
    $result = "<table style='border: 1px #000 solid; width: 800px;'>
    <thead>
        <tr style='background:#D3D3D3; color: #000; '>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Stt</strong></td>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Ảnh</strong></td>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Tên sản phẩm</strong></td>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Giá</strong></td>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Số lượng</strong></td>
            <td style='border: 2px #000 solid;padding: 10px;'><strong>Tổng</strong></td>
        </tr>
    </thead>
    <tbody>";
    $temp = 0;
    foreach ($list_cart as $v){
        $temp++;
        $result .= "<tr style='text-align: center; font-family: sans-serif;'>";
        $result .= "<td style='border: 2px #000 solid; padding: 10px;'>{$temp}</td>";
        $result .= "<td style='border: 2px #000 solid; padding: 10px;'><div style='border: 1px solid #B5B5B5; width: 80px; height: auto; padding: 1px;'>"."<img w-100 src='admin/{$v['product_thumb']}' alt='alt'/>"."</div></td>"; 
        $result .= "<td style='border: 2px #000 solid; padding: 10px;'>{$v['product_title']}</td>";
        $result .= "<td style='border: 2px #000 solid;padding: 10px 15px'>".currency_format($v['price'],'VNĐ')."</td>";  
        $result .= "<td style='border: 2px #000 solid;padding: 10px;'>{$v['qty']}</td>"; 
        $result .= "<td style='border: 2px #000 solid;padding: 10px 15px;'>".currency_format($v['sub_total'],'VNĐ')."</td>";
        $result .= "</tr>";
    }
    $result .= "<tr>";
    $result .= "<td></td>";
    $result .= "<td></td>";
    $result .= "<td></td>";
    $result .= "<td></td>";
    $result .= "<td style='border: 2px #000 solid;padding: 10px 14px;'><strong>Tổng đơn</strong></td>";
    $result .= "<td style='border: 2px #000 solid;padding: 10px 15px;color: red;font-weight: bold;'>".currency_format($total_order, 'VNĐ')."</td>";
    $result .= "</tr>";
    $result .= "</tbody></table>";
    return $result;
}

          

//
//          <table style='border: 1px #000 solid; width: 70%'>
//        <h3 style='font-family: 'Roboto Bold';padding: 40px 0px 3px 40px;'>Sản phẩm đặt mua</h3>
//    <thead>
//        <tr style='background:#D3D3D3; color: #000; '>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Stt</strong></td>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Ảnh</strong></td>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Tên sản phẩm</strong></td>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Giá</strong></td>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Số lượng</strong></td>
//            <td style='border: 2px #000 solid;padding: 10px;'><strong>Tổng</strong></td>
//        </tr>
//    </thead>
//    <tbody>
//        <tr style='text-align: center; font-family: sans-serif;'>
//            <td style='border: 2px #000 solid; padding: 10px;'>Stt</td>
//            <td style='border: 2px #000 solid; padding: 10px;'><div style='border: 1px solid #B5B5B5; width: 80px; height: auto; padding: 1px;'><img w-100 src='public/images/img-detail.jpg' alt='alt'/></div></td>
//            <td style='border: 2px #000 solid; padding: 10px;'>Tên sản phẩm</td>
//            <td style='border: 2px #000 solid;padding: 10px 15px'>Giá</td>
//            <td style='border: 2px #000 solid;padding: 10px;'>Số lượng</td>
//            <td style='border: 2px #000 solid;padding: 10px 15px;'>Tổng</td>
//        </tr>
//            <td></td>
//            <td></td>
//            <td></td>
//            <td></td>
//            <td style="border: 2px #000 solid;padding: 10px;"><strong>Tổng đơn</strong></td>
//            <td style="border: 2px #000 solid;padding: 10px 15px;color: red;font-weight: bold;"><?php echo currency_format($data_order['total_order'], 'VNĐ')?></td>
<!--        </tr>
//    </tbody>
//</table> -->