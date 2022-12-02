<?php get_header() ?>

<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="Trang-chu" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   <form method="POST" action="" name="form-checkout"> 
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ và tên</label>
                            <?php echo form_error('fullname') ?>
                            <input type="text" name="fullname" id="fullname" placeholder="Yêu cầu bắt buộc *">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <?php echo form_error('email') ?>
                            <input type="email" name="email" id="email" placeholder="Yêu cầu bắt buộc *">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <?php echo form_error('address') ?>
                            <input type="text" name="address" id="address" placeholder="Yêu cầu bắt buộc *">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <?php echo form_error('phone_number') ?>
                            <input type="tel" name="phone_number" min="0" max="9" maxlength="10" id="phone" placeholder="Yêu cầu bắt buộc *">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" placeholder="Không bắt buộc..." cols="10" rows="5"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <?php if(!empty($list_buy_cart)){ ?>
                    <tbody>
                        <?php foreach ($list_buy_cart as $v) { ?>
                        <tr class="cart-item">
                            <td class="product-name"><?php echo $v['product_title']?><strong class="product-quantity">x <?php echo $v['qty']?></strong></td>
                            <td class="product-total"><?php echo currency_format($v['sub_total'])?></td>
                        </tr>
                       <?php } ?> 
                    </tbody>
                    <?php } ?>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php echo currency_format(get_total_cart())?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li><h4>Phương thức thanh toán:</h4></li>
                        <li>
                         <input type="radio" id="direct-payment" name="payment-method" value="1"><!--   direct-payment-->
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                        <input type="radio" id="payment-home" name="payment-method" value="2" checked="checked">       <!--payment-home-->
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" name="btn_order_now" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
    </div>
   </form>    
</div>

<?php get_footer() ?>

