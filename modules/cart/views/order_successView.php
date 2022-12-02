
<?php get_header() ?>
<?php 
$where = cart_order_succ('confirm');
$data_order = db_fetch_row("SELECT* FROM `tbl_orders` WHERE `email` = '{$where}'"); 

?>
<style>
    p.success_order,p.trang,p.trang1,p.thankyou{
        text-align: center;
        font-size: 20px;
        margin: 50px auto; 
    }
    
    p.success_order{
        color: green;
        font-size: 40px;
    }
    p.trang{
    display: inline-block;
    margin: 50px 20px;
    padding: 10px 35px;
    background: #FF0000;
    border-radius: 9px;
    }
      p.trang1{
    display: inline-block;
    margin: 50px 20px;
    padding: 10px 38px;
    background: #7FFF00;
    border-radius: 10px;
    }
    p.info,.tile{
        font-size: 21px;
        padding: 10px 0px;
        font-family: 'Roboto Regular';
    }
    p.thankyou{font-family: 'Roboto Bold' ;}
    p.info span{
       font-family: 'Roboto Bold' ;
       padding-left:4px;
    }
    h3.cart{
        font-size: 20px;
        font-style: oblique;
        font-family: 'Roboto Bold';
        padding: 40px 0px 3px 40px;
    }
    
</style>

<div id="wrapper" class="wp-inner clearfix" style="background:#FFFAF0; min-height: 500px; border-bottom:  2px #000 solid; padding: 4px">
    <p class="success_order"><i class="fa-regular fa-circle-check"></i><span style=" padding-left: 10px;">Đặt hàng thành công.</span></p>
    <p class="info">-Xin chào <span><?php echo $data_order['fullname']?></span></p>
    <h3 class="tile">*Dưới đây là thông tin người nhận</h3>
    <p class="info">-Người nhận: <span><?php echo $data_order['fullname']?></span></p>
    <p class="info">- Email: <span><?php echo $data_order['email']?></span></p>
    <p class="info">- Địa chỉ: <span><?php echo $data_order['address']?></span></p>
    <p class="info">- Số điện thoại: <span><?php echo $data_order['phone_number']?></span></p>
    <p class="info">- Thời gian đặt hàng: <span><?php echo date("h:m:s d/m/Y",$data_order['created_date'])?></span></p>
  
    <table style="border: 1px #000 solid; width: 850px">
        <h3 class="cart">Sản phẩm đặt mua</h3>
    <thead>
        <tr style="background:#D3D3D3; color: #000; ">
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Stt</strong></td>
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Ảnh</strong></td>
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Tên sản phẩm</strong></td>
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Giá</strong></td>
            <td style="border: 2px #000 solid;padding: 10px 15px;"><strong>Số lượng</strong></td>
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Tổng</strong></td>
        </tr>
    </thead>
    <tbody>
        <?php $temp=0; foreach (json_decode($data_order['order_details'], true) as $v){  $temp++?>
        <tr style="text-align: center; font-family: sans-serif;">
            <td style="border: 2px #000 solid; padding: 10px;"><?php echo $temp?></td>
            <td style="border: 2px #000 solid; padding: 10px;"><div style="border: 1px solid #B5B5B5; width: 80px; height: auto; padding: 1px;"><img w-100 src="admin/<?php echo $v['product_thumb']?>" alt="alt"/></div></td>
            <td style="border: 2px #000 solid; padding: 10px;color: red;"><?php echo $v['product_title']?></td>
            <td style="border: 2px #000 solid;padding: 10px 15px"><?php echo currency_format($v['price'], 'VNĐ')?></td>
            <td style="border: 2px #000 solid;padding: 10px;"><?php echo $v['qty']?></td>
            <td style="border: 2px #000 solid;padding: 10px 15px;color: red;font-weight: bold;"><?php echo currency_format($v['sub_total'], 'VNĐ')?></td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border: 2px #000 solid;padding: 10px;"><strong>Tổng đơn</strong></td>
            <td style="border: 2px #000 solid;padding: 10px 15px;color: red;font-weight: bold;"><?php echo currency_format($data_order['total_order'], 'VNĐ')?></td>
        </tr>
    </tbody>
</table>
    <p class="thankyou">Cảm ơn bạn đã tin tưởng ủng hộ sản phẩm của hệ thống <span style="color:#8BD8BD">X</span><span style="color:#EC4D37">M</span> STORE <br> mang đến cho bạn trải nghiện, tin cậy, uy tín tạo thương hiệu.</p>
    <p class="thankyou" >Nhân viên tư vấn sẽ liên hệ với bạn sau ít giờ nữa...</p>
    <div style="display:flex; justify-content: center;">
    <p class="trang"><a href="Trang-chu" style="color: #fff;">Trang chủ</a></p>
    <p class="trang1"><a href="https://mail.google.com/mail/u/0/#inbox" style="color: #000;">Check Mail</a></p>
    </div>
</div>
<?php get_footer() ?>

<!--<i class="fa-sharp fa-solid fa-circle-check"></i>-->
