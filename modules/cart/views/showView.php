<?php get_header() ?>
<?php // show_array($list_buy_cart); ?>

<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="Trang-chu" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php if(!empty($list_buy_cart)){ ?>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                </<form action="?mod=cart&action=update" method="POST">  
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($list_buy_cart as $item) {?>
                        <tr>
                            <td><?php echo $item['code']?></td>
                            <td>
                                <a href="<?php echo $item['url']?>" title="<?php echo $item['product_title']?>" class="thumb">
                                    <img src="admin/<?php echo $item['product_thumb']?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $item['url']?>" title="<?php echo $item['product_title']?>" class="name-product"><?php echo $item['product_title']?></a>
                            </td>
                            <td><?php echo currency_format($item['price'])?></td>
                            <td>
                                <input type="number" data-id="<?php echo $item['id'] ?>" name="qty[<?php echo $item['id'] ?>]" min="1" max="10" value="<?php echo $item['qty'] ?>" class="num-order">
                            </td>
                            <td id="sub-total-<?php echo $item['id'] ?>"><?php echo currency_format($item['sub_total'])?></td>
                            <td>
                                <a href="<?php echo $item['url_delete_cart']?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                     <?php } ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format(get_total_cart())?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type="submit" title="" name="btn_update_cart" id="update-cart" value="Cập nhật giỏ hàng" />
                                        <a href="Thanh-toan/dat-hang.html" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              </form>  
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&action=deleteAll" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
    <?php } else { 
      echo        $not_product = " <div id='wrapper' class='wp-inner clearfix'><div class='cart_empty'>
                        <img style='width:400px; margin:20px auto' src='public/images/shopping-cart.png' alt=''>
                        <p style='padding:20px;'>Giỏ hàng chưa có sản phẩm nào...</p>
                        <a class='shopping_now' href='?'>Shopping go <i class='fa-solid fa-cart-shopping'></i></a>
                        </div></div>";
   } ?>
</div>
<style>
    .cart_empty{
        text-align: center;
        font-size: 25px;
        
    }  
    .cart_empty .shopping_now{
        padding: 8px 13px;
         background: #d94f4fab; 
        color: #fff;
        border-radius: 9px;
        font-size: 19px;
        transition: ba ease-in-out 3s;
    }
    
    .cart_empty .shopping_now:hover{
       background:#de2525f5; 
    }
    
</style>
<?php get_footer() ?>