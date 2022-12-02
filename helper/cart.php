<?php
//Các bước mà giỏ hàng xử lý
/**:Thêm giỏ hàng:
 * Bước 1: Sản phẩm đi vào Addaction kèm $id
 * Bước 2: Sản phẩm thêm vào mảng cart(Hay gọi là dỏ hàng)
 * (--) Đối với $qty(hay số lượng) của sản phẩm có `2` mục cần kiểm tra:
 * (+) Với sản phẩm new thêm vào mà chưa có trong giỏ hàng thì $qty sản phẩm mặc định là $qty = 1
 * (+) sản phẩm đã có trong giỏ hàng mà có $id giống với $id của sản phẩm ms add thì $qty +1
 * (--) Giá sản phẩm thì bằng $qty * $price
 *  --> Kết quả ta thêm được sản phẩm vào giỏ hàng mà chưa có tổng tiền
 *  Bước 3:Cập nhật cái tổng order(Hay số lượng sản phẩm có trong giỏi hàng) và Tổng thành tiền của các sản phẩm có trong giỏ hàng Không theo $id = Các bước
 * (--) Kiểm tra giỏ hàng có sản phẩm nào hay không ($_SESSION['cart]) có tồn tại hay ko
 * (--) Duyệt mảng $_SESSION['cart']['buy](nghĩa là các sp đã chọn mua trong giỏ hàng)
 * (+)  Cộng giá và số lượng của các sản phẩm đã mua trong giỏ hàng vào 2 biến tạo sẵn để lưu Tổng giá và Tổng order
 * --> Tạo mảng $_SESSION['cart']['info'] với 2 trường total và num_order để lưu lại 2 kết quả đã duyệt mảng trên
 * 
 */



function add_cart($id ,$item){
    
    $qty= 1;
   
    if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
        $qty = $_SESSION['cart']['buy'][$id]['qty']+1;
    }
//     foreach ($product_by_id as $item){ //Lỗi ngớ ngẩn về session
    $_SESSION['cart']['buy'][$id]= array(
        'id'=> $item['id'],
      'product_thumb'=> $item['upload_file'],
      'product_title' => $item['p_name'],
      'code' => $item['code'],
      'price' => $item['price'],
      'qty' => $qty,
      'sub_total'=> $qty * $item['price']
    );

    
}


// Cập nhập cái tổng tiền các sp và số lượng sp đã mua trong giỏ hàng 
function update_info_cart(){
    if(isset($_SESSION['cart'])){
        $num_order = 0;
        $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item){
        $num_order += $item['qty'];
         $total += $item['sub_total'];       
    }
    $_SESSION['cart']['info']= array(
        'num_order' => $num_order,
        'total' => $total
    );  
    }
  
}

// Duyệt mảng để sản phẩm đã mua trong giỏ hàng để show cho Client
function get_list_buy_cart(){
     if(isset($_SESSION['cart'])){
     foreach ($_SESSION['cart']['buy'] as &$item){
         //Thêm 2 trường quay lại trang chi tiết sản phẩm đã mua để xem hay mua lại và trường delete theo $id
      $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['id']}";
      $item['url'] = "?mod=product&action=product_detail&id={$item['id']}";
          
     }
     return $_SESSION['cart']['buy'];
     } 
     return false;
}


// Lấy tổng tiền các sản phẩm có trong giỏ hàng 
function get_total_cart(){
    if(!empty($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }
}
function get_order_cart(){
    if(!empty($_SESSION['cart'])){
        return $_SESSION['cart']['info']['num_order'];
    }
}
// Delete sản phẩm
function delete_cart($id){
    if(isset($_SESSION['cart'])){
      //Xóa sản phẩm theo $id  
        if(!empty($id)){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        } else {
        //Xóa sản phẩm ko $id không cần $id là xóa hết
            unset($_SESSION['cart']); 
        }
    }
}

//Cập nhật lại số lượng và giá trong giỏ hàng input number tích chuyển động số của input với ajax, Cập nhập lại tổng order và tổng giá tiền các sản phẩm
function update_cart($qty){
        foreach ($qty as $id => $new_qty){
            $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
            $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
            
        }
        update_info_cart();
}


//2 Hàm dưới checkout theo id 1/sp 
function add_cartCheckout($id ,$item){
  //Đây là Hàm viết với các sản phẩm khi nhấp nút Mua ngay mà theo $id chỉ một sp đó thôi  
    $qty= 1;
   
//    if(isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])){
//        $qty = $_SESSION['cart']['buy'][$id]['qty']+1;
//    }
//     foreach ($product_by_id as $item){ //Lỗi ngớ ngẩn về session
    $_SESSION['cart']['buy'][$id]= array(
        'id'=> $item['id'],
      'product_thumb'=> $item['upload_file'],
      'product_title' => $item['p_name'],
      'code' => $item['code'],
      'price' => $item['price'],
      'qty' => $qty,
      'sub_total'=> $qty * $item['price']
    );

    
}
function get_product_buy_now($id){
     if(isset($_SESSION['cart']['buy'])){
//     foreach ($_SESSION['cart']['buy'] as &$item){
//         //Thêm 2 trường quay lại trang chi tiết sản phẩm đã mua để xem hay mua lại và trường delete theo $id
//      $item['url_delete_cart'] = "?mod=cart&controller=index&action=delete&id={$item['id']}";
//      $item['url'] = "?mod=product&action=product_detail&id={$item['id']}";
//          
//     }
     return $_SESSION['cart']['buy'][$id];
     } 
     return false;
}
