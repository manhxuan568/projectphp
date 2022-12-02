<?php

function construct() {
    load_model("index");
}

function indexAction(){
  
}

function list_orderAction(){
    
    $num_rows = db_num_rows("SELECT* FROM `tbl_orders`");
    $num_per_page = 5;
    $num_page = ceil($num_rows/$num_per_page);
    $page = isset($_GET['page'])?$_GET['page']:1;
    $start = ($page -1)* $num_per_page;
    $list_order = get_list_order($start, $num_per_page);
     global $error;
    if(isset($_POST['btn_status'])){
        $error = array();
      //
        if(empty($_POST['status'])){
            $error['status'] = "Bạn chưa chọn tác vụ!";
        }else{
            $status = $_POST['status'];
        }
      // 
         if(empty($_POST['checkItem'])){
            $error['checkItem'] = "Bạn cần tích vào các đơn để chuyển đổi trạng thái!";
        }else{
            $check = $_POST['checkItem'];
        }
       //Kết quả
        if(empty($error)){
            foreach ($check as $v){
               $data = array(
                   'status_order' => $status
               );
               update_status_order($data, $v);
            }
            $_SESSION['success'] = "Cập nhập trạng thái thành công!";
        }
    }
    
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['list_order'] = $list_order;
    load_view('list_order', $data);
}

function detail_orderAction(){
    $id = (int)$_GET['order_id'];
  $detail_order_by_id = get_detail_order_by($id);
       global $error; 
         if(isset($_POST['btn_status'])){
                $error = array();
      //
        if(empty($_POST['status'])){
            $error['status'] = "Bạn cần chọn trạng thái cập nhật!";
        }else{
            $status = $_POST['status'];
        } 
        //kết quả
            if(empty($error)){
                 $data = array(
                   'status_order' => $status
               );
               update_status_order($data, $id);
               $_SESSION['status'] = "Cập nhập trạng thái thành công!";
            }
         }
  
    $data['detail_order_by_id'] = $detail_order_by_id;
    load_view('detail_order', $data);
}
function list_customerAction(){
    $num_rows = db_num_rows("SELECT* FROM `tbl_orders`");
    $num_per_page = 5;
    $num_page = ceil($num_rows/$num_per_page);
    $page = isset($_GET['page'])?$_GET['page']:1;
    $start = ($page -1)* $num_per_page;
    $list_customer = get_list_order($start, $num_per_page);
    global $error;
    if(isset($_POST['tbn_action'])){
        $error = array();
        if(empty($_POST['actions'])){
            $error['actions'] = "Bạn cần chọn những mục cần xóa!";
        } else {
            $actions = $_POST['actions'];
        }
         if(empty($_POST['checkItem'])){
            $error['checkItem'] = "Chưa có khách hàng để xóa!";
        } else {
            $checkItem = $_POST['checkItem'];
        }
        
        //kết quả xóa
        if(empty($error)){
            foreach ($checkItem as $v){
                if($actions == 'delete'){
                   delete_action($v); 
                }
            }
        }
    }
    
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['list_customer'] = $list_customer;
    load_view('list_customer', $data);
}

function deleteAction(){
    $id = (int)$_GET['order_id'];
    delete_order($id);
    redirect("?mod=selled&action=list_order");
}

function delete_customerAction(){
    $id = (int)$_GET['order_id'];
    delete_order($id);
    redirect("?mod=selled&action=list_customer");
}