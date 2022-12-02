<?php
get_header()
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $detail_order_by_id['code_orders'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $detail_order_by_id['address'] ?> / <?php echo $detail_order_by_id['phone_number'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php echo show_payment($detail_order_by_id['payment']) ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <?php echo form_success("status");
                                unset($_SESSION['status']);   
                        ?>
                        <?php echo form_error("status")?>
                            <select name="status">
                                <option  value='pending'>Chờ duyệt đơn</option><option value='shipping'>Đang vận chuyển</option><option  value='success'>Giao thành công</option><option  value='cancel'>Đơn bị hủy</option></select>
                            <input type="submit" name="btn_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $temp = 0;
                            foreach (json_decode($detail_order_by_id['order_details'], true) as $v) { $temp++; ?>
                                
                            <tr>
                                <td class="thead-text"><?php echo $temp; ?> </td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img src="<?php echo $v['product_thumb']?>" alt="">
                                    </div>
                                </td>
                                <td class="thead-text"><?php echo $v['product_title']?></td>
                                <td class="thead-text"><?php echo currency_format($v['price'], "VNĐ")?></td>
                                <td class="thead-text"><?php echo $v['qty']?></td>
                                <td class="thead-text"><?php echo currency_format($v['sub_total'], "VNĐ")?></td>
                            </tr>
                              <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $detail_order_by_id['num_order'] ?> sản phẩm</span>
                            <span class="total"><?php echo currency_format($detail_order_by_id['total_order'] , 'VNĐ') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php get_footer() ?>
