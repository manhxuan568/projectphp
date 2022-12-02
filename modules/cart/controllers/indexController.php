<?php

function construct() {
    load_model('index');
    load("lib", "sendmail");
}

function indexAction(){
    
}

function addAction(){
    
$item = "";    
$id = isset($_GET['id'])?(int)$_GET['id']:"";    
$item = get_product_by_id($id);
 
  
  add_cart($id, $item);
  update_info_cart();
//  show_array($_SESSION['cart']);
  redirect(base_url()."Gio-hang/thanh-toan.html");
   
}
                                          
function showAction(){
 
                             
    $list_buy_cart = get_list_buy_cart();
    $data['list_buy_cart'] = $list_buy_cart;
    load_view("show", $data);
}


function deleteAction(){

   $id = isset($_GET['id'])?(int)$_GET['id']:"";
   delete_cart($id);
   redirect("Gio-hang/thanh-toan.html");
}

function deleteAllAction(){

  delete_cart($id);
  redirect("Gio-hang/thanh-toan.html");
}

function updateAction(){

    if(isset($_POST['btn_update_cart'])){
        update_cart($_POST['qty']);
        redirect("Gio-hang/thanh-toan.html");
    }
    
}

function updateajaxAction(){
   
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $item = get_product_by_id($id);
    if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
        
        $_SESSION['cart']['buy'][$id]['qty'] = $qty;
        $sub_total = $qty * $item['price'];
        $_SESSION['cart']['buy'][$id]['sub_total'] = $sub_total;
        update_info_cart();
        $total = get_total_cart();
        $data = array(
            'sub_total' => currency_format($sub_total),
            'total' => currency_format($total)
        );
       echo json_encode($data);
    }
}

function checkoutAction(){
    global $error;
    $list_buy_cart = get_list_buy_cart();
             
    if(isset($_POST['btn_order_now'])){
        $error = array();
        $code_orders= "";
        $list_cart = "";
        //fullname
      if(empty($_POST['fullname'])){
          $error['fullname'] = "Bạn cần điền họ và tên!";
      } else {
        $fullname = $_POST['fullname'];    
      } 
      //email
      if(empty($_POST['email'])){
          $error['email'] = "Bạn chưa có email!";
      } else {
          if(!is_email($_POST['email'])){
              $error['email']= "Email của bạn chưa theo yêu cầu";
        } else {
          $email = $_POST['email'];    
        }    
      } 
      //address
       if(empty($_POST['address'])){
          $error['address'] = "Bạn chưa có địa chỉ để nhận hàng!";
      } else {
        $address = $_POST['address'];    
      } 
      //phone_number
      if(empty($_POST['phone_number'])){
          $error['phone_number'] = "Bạn chưa số điện thoại để liên hệ!";
      } else {
        $phone_number = $_POST['phone_number'];    
      }
      //note
        if(empty($_POST['note'])){
          $note = "";
      } else {
        $note = $_POST['note'];    
      }
       
      //Kết quả
      if(empty($error)){
          $code_orders = rand(1,9999)."#PHP".rand(1,99);
          $list_cart = json_encode($list_buy_cart);
          $payment_method = $_POST['payment-method'];
          $content = "<p>Cảm ơn <strong style='color:green;'>{$fullname}</strong> bạn đã đặt hàng thành công tại XM STORE.VN</p>"."<h3 style='font-family: 'Roboto Bold';padding: 40px 0px 3px 40px;'>Sản phẩm đặt mua</h3>".content($list_buy_cart,get_total_cart())."<p>Mọi thắc mắc của bạn có thể liên hệ đến Xuân Mạnh SĐT:0984601906";
                    
               
          $data = array(
              'fullname' => $fullname,
              'email' => $email,
              'phone_number' => $phone_number,
              'address' => $address,
              'note' => $note,
              'code_orders' => $code_orders,
              'created_date' => time(),
              'order_details' => $list_cart,
              'payment' => $payment_method,
              'num_order' => json_encode(get_order_cart()),
              'total_order' => json_encode(get_total_cart()),
          );
        insert_into_order($data);
        $_SESSION['confirm'] = $email; //show đơn hàng bên trang order success
        send_mail($email, $fullname, "Tin nhắn này được gửi tự động từ Xuân Mạnh", $content);
        redirect(base_url()."Dat-hang/thanh-cong");
      }
    }
    $data['list_buy_cart'] = $list_buy_cart;
    load_view("checkout",$data);
}

//2 Hàm dưới checkout theo id 1/sp 
function addCheckoutAction(){
 //Đây là Hàm viết với các sản phẩm khi nhấp nút Mua ngay mà theo $id chỉ một sp đó thôi  
$item = "";    
$id = isset($_GET['id'])?(int)$_GET['id']:"";    
$item = get_product_by_id($id);
 
  
  add_cartCheckout($id, $item);
  update_info_cart();
//  show_array($_SESSION['cart']);
  redirect("?mod=cart&action=checkout_id&id=$id");
   
} 

function checkout_idAction(){
    $id = isset($_GET['id'])?(int)$_GET['id']:"";
    $list_buy_cart = get_product_buy_now($id);
    $data['list_buy_cart'] = $list_buy_cart;
    load_view("checkout_id",$data);
}
function order_successAction(){
    
    load_view("order_success");
}

