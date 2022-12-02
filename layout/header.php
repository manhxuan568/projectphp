<?php   $list_buy_cart = get_list_buy_cart();?>

<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo base_url() ?>" />
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/users.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-3.5.0.min.js" type="text/javascript"></script>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/filter_data.js" type="text/javascript"></script>
        <script src="public/js/ajax_cart.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
           .search-ajax-result .media{
                display:flex;
                padding: 10px;
            }
        </style>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="Trang-chu" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="Danh-sach/san-pham.html" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="Blog.html" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="gioi-thieu-13.html" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="lien-he-14.html" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="Trang-chu" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form action="Search/tim-kiem" method="POST" style="position: relative">
                                    <input type="search" name="search-ajax" id="s" class="search-ajax" placeholder="Nhập từ khóa tìm kiếm tại đây!" >
                                    <button type="submit" name="btn_filter" id="sm-s">Tìm kiếm</button>
                                    <div class="search-ajax-result" style="width: 100%; background: #fff;  border-radius: 5px; position: absolute; z-index:10 ">
<!--                                        <div class="media">
                                            <a href="">
                                                <img src="public/images/img-pro-05.png" width="50" height="" alt="alt"/>
                                            </a>
                                            <div class="media_body" style=" padding-left: 10px ;font-style: italic;">
                                                <h3><a href="url">Sản phẩm 1</a></h3>
                                            </div>    -->
                                        </div>
                                    </div>
                                </form>
                            
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php echo get_order_cart() ?></span>
                                    </div>
                                    <?php if(!empty($list_buy_cart)){?>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php echo get_order_cart() ?> sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                          <?php foreach($list_buy_cart as $v){ ?>  
                                            <li class="clearfix">
                                                <a href="<?php echo $v['url']?>" title="" class="thumb fl-left">
                                                    <img src="admin/<?php echo $v['product_thumb']?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"><?php echo $v['product_title']?></a>
                                                    <p class="price"><?php echo currency_format($v['price'])?></p>
                                                    <p class="qty">Số lượng: <span><?php echo $v['qty']?></span></p>
                                                </div>
                                            </li>
                                          <?php } ?>  
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo currency_format(get_total_cart())?></p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="Gio-hang/thanh-toan.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="Thanh-toan/dat-hang.html" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                   <?php }else{
                                       $not_product = "<div id='dropdown'>
                                           <img style='width:150px;height:150px; margin:1px auto' src='public/images/shopping-cart.png' alt=''>
                                           <p  style='text-align:center; color:gray;'>Chưa có sản phẩm nào...</p></div>";
                                       echo $not_product;
                                   } ?>
                                </div>
                            </div>
                           </div>     
                        </div>
                    </div>
                </div>