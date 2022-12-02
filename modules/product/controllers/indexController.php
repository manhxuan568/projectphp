<?php

function construct() {
    load_model('index');
    
}

function indexAction() {
    
}
function category_productAction() {
    //sắp xếp
    $orderCondion = "";
    $parem = "";
    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
    //bộ lọc
    $parem_pcat = "";
    $parem_price = "";
    $whereCondition_pcat = "";
    $whereprice = "";
    $and = "";
    $get_page = "";
    $products_by_cid_price = "";
    $num_total_products = "";
    $error = "";
$orderPrice = isset($_GET['price'])?(int)$_GET['price']:"";
$orderProductcat = isset($_GET['productCat'])?$_GET['productCat']:"";

    //phân trang pagging
  $num_rows = db_num_rows("SELECT* FROM `tbl_products`");
  $num_per_page = 8;
  $num_page = ceil($num_rows/$num_per_page);
  $page = isset($_GET['page'])?$_GET['page']:1;
  $start = ($page -1)* $num_per_page;
  //sắp xếp
  if(!empty($_GET['field']) && !empty($_GET['sort'])){
   $orderCondion = "ORDER BY `tbl_products`.`".$orderField."` {$orderSort}";
   $parem = "&field=".$orderField."&sort=".$orderSort;//là để ở url pagging
   }
   //Bộ lọc
   if(!empty($_GET['productCat'])){
       ////////
       $whereCondition_pcat = "`product_type` = '{$orderProductcat}'";
       $parem_pcat = "&productCat=".$orderProductcat;
   }
   if(!empty($_GET['price'])){
    if(10000000 >= $_GET['price']){
      $whereprice .=  "`price` < '{$orderPrice}'";
    }else{
       $whereprice .=  "`price` > '{$orderPrice}'";
   }
   $parem_price = "&price=".$orderPrice;
   }
   //
   if(!empty($_GET['productCat']) && !empty($_GET['price'])){
       $and = "AND";
   }
  
   //lấy dữ liệu sản phẩm có điều kiện có thanh pagging 
  if(!empty(get_page($orderCondion, $start, $num_per_page, "".$whereprice."{$and}".$whereCondition_pcat.""))){
       $get_page = get_page($orderCondion, $start, $num_per_page, "".$whereprice."{$and}".$whereCondition_pcat.""); 
       $num_total_products = num_total_products();
       $products_by_cid_price = total_products_by_cid_price("".$whereprice."{$and}".$whereCondition_pcat."");
  }else{
      $error = "<div class='main-content fl-right'><img style='display: block;width:500px; height:auto; margin: 10px auto;' src='https://www.dokantec.com/resources/assets/front/images/no-product-found.png' alt=''></div>";
  }
    
    $data['error'] = $error;
    $data['products_by_cid_price'] = $products_by_cid_price;
    $data['num_total_products'] = $num_total_products;
    $data['parem_pcat'] = $parem_pcat;
    $data['parem_price'] = $parem_price;
    $data['parem'] = $parem;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    $data['get_page'] = $get_page;
    load_view('list_product', $data);
}

function danh_mucAction(){
    //Lấy dữ liệu các sản phẩm theo get id
    $get_id = isset($_GET['id'])?(int)$_GET['id']:"";
    $list_product_by_id = "";
    $cat_name = "";
    
  
    
   //Lấy dữ liệu các sản phẩm theo get id
    if(get_list_product_by_loai($get_id)){
       $list_product_by_id = get_list_product_by_loai($get_id); 
    } else {
        if(get_list_product_by_line($get_id)){
        $list_product_by_id = get_list_product_by_line($get_id);
        }else{
          $list_product_by_id = get_list_product_by_hang($get_id); 
        }
    }
    
    $cat_name = get_cat_name_id($get_id);
    $data['cat_name'] = $cat_name;  
    $data['list_product_by_id'] =  $list_product_by_id;
    load_view("list_product_id", $data);
}

function product_detailAction(){
    $id = isset($_GET['id'])?(int)$_GET['id']:"";
    
    //lấy chi tiết sản phẩm theo id
    $product_by_id = get_product_by_id($id);
   //Những sản phẩm có liên quan có thể quan tâm
   $list_product_co_lien_quan =  get_list_product_by_line($product_by_id['cat_id']);
    $data['list_product_co_lien_quan'] = $list_product_co_lien_quan;
    $data['product_by_id'] = $product_by_id;
    load_view("product_detail", $data);
}

