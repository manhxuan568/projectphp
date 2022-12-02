<?php

function construct() {
 load('lib', 'data_cat');
    load_model('index');
}

function add_productAction() {
    global $error;
    if(isset($_POST['btn_add_product'])){
        $error = array();
        //tên-sp
        if(empty($_POST['p_name'])){
            $error['p_name'] = "Chưa có tên sản phẩm!";
        }else{
            $p_name = $_POST['p_name'];
        }
        //slug
        if(empty($_POST['slug'])){
            $error['slug'] = "Chưa có link thân thiện!";
        }else{
            $slug = $_POST['slug'];
        }
        //code
        if(empty($_POST['code'])){
            $error['code'] = "Chưa có mã sản phẩm!";
        }else{
            $code = $_POST['code'];
        }
        //price
        if(empty($_POST['price'])){
            $error['price'] = "Chưa có giá sản phẩm!";
        }else{
            $price = $_POST['price'];
        }
        //leftover_product
        if(empty($_POST['leftover_product'])){
            $error['leftover_p'] = "Chưa có số lượng sản phẩm!";
        }else{
            $leftover_p = $_POST['leftover_product'];
        }
        //desc
        if(empty($_POST['desc'])){
            $error['desc'] = "Chưa có mô tả sản phẩm!";
        }else{
            $desc = $_POST['desc'];
        }
        //content
        if(empty($_POST['content'])){
            $error['content'] = "Chưa có chi tiết sản phẩm!";
        }else{
            $content = $_POST['content'];
        }
        //upload_img
                 if (isset($_FILES['file'])) {
//      $error= array();
            $upload_dir = 'uploads/products/';
            // Đường dẫn của file sửa khi upload
            $upload_file = $upload_dir . $_FILES['file']['name'];
            //Xử lý upload dúng file ảnh
            $type_allow = array('png', 'jpg', 'gif', 'jpeg');
            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array(strtolower($type), $type_allow)) {
                $error['type'] = 'Chỉ được upload file có đuôi png, jpg, gif, jpeg'; //điều kiện 1
            } else {
                #Upload file có kích thước cho phép (<20MB ~ 29.000.000 Byte)
                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) { // điều kiện 2
                    $error['file_size'] = 'Chỉ được upload file bé hơn 20MB';
                }
                #Kiểm tra trùng file trên hệ thống;
                if (file_exists($upload_file)) { // điều kiện 3
                    //  $error['file_exists'] = 'File đã tồn tại trên hệ thống';
                    $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                    $new_file_name = $file_name . "- copy.";
                    $new_upload_name = $upload_dir . $new_file_name . $type;
                    $k = 1;
                    while (file_exists($new_upload_name)) {
                        $new_file_name = $file_name . "- copy{$k}.";
                        $k++;
                        $new_upload_name = $upload_dir . $new_file_name . $type;
                    }
                    $upload_file = $new_upload_name;
                }
            }
        }
        //cat_product
         if(empty($_POST['parent_id'])){
            $error['parent_id'] = "Chưa chọn danh mục sản phẩm!";
        }else{
            $parent_id = $_POST['parent_id'];
        }
        //product_type
        if(empty($_POST['product_type'])){
            $error['product_type'] = "Chưa chọn loại sản phẩm!";
        }else{
            $product_type = $_POST['product_type'];
        }
        //status
         if(empty($_POST['status'])){
            $error['status'] = "Chưa chọn danh mục sản phẩm!";
        }else{
            $status = $_POST['status'];
        }
        //kết quả
        if(empty($error)){
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'p_name' => $p_name,
                'slug' => $slug,
                'price' => $price,
                'leftover_product' => $leftover_p,
                'product_desc' => $desc,
                'p_content' => $content,
                'upload_file' => $upload_file,
                'cat_id' => $parent_id,
                'status' => $status,
                'creator' => user_login(),
                'created_date' => time(),
                'code' => $code,
                'product_type' => $product_type
            );
            product_insert($data);
            $_SESSION['product_add'] = "Thêm sản phẩm mới thành công";
        }
    }
    load_view('add_product');
}


function list_productAction() {
   global $error;
    $num_rows = db_num_rows("SELECT* FROM `tbl_products`");
    $num_per_page = 5;
    $num_page = ceil($num_rows/$num_per_page);
    $page = isset($_GET['page'])?$_GET['page']:1;
    $start = ($page -1)* $num_per_page;
    
    //tác vụ
    if(isset($_POST['btn_action'])){
        $error = array();
        if(empty($_POST['checklist'])){
            $error['check']= "Chưa chọn đối tượng nào";
        }else{
            $checklist = $_POST['checklist'];
        }
         if(empty($_POST['actions'])){
            $error['actions']= "Chưa chọn đối tượng nào";
        }else{
            $actions = $_POST['actions'];
        }
   
        if(empty($error)){
             foreach ($checklist as $item){
          $data = array(
              'status'=> $actions
          ); 
          update_status_p($data, $item);
        }
        $_SESSION['actions_p'] = 'Cập nhập tác vụ thành công!';
        }
    }
    //search phone
    if(isset($_POST['search'])){
        $s = $_POST['s'];
        $list_product = get_list_product($start,$num_per_page, "`p_name` = '{$s}'"); 
    }
    //get_status
    if(isset($_GET['status'])){
        $status = $_GET['status'];
       $list_product = get_list_product($start,$num_per_page, "`status`='{$status}'"); 
    }else{
        $list_product = get_list_product($start,$num_per_page); 
    }
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['list_product'] = $list_product;
    load_view('list_product', $data);
}

function  editAction(){
    $id = (int)$_GET['id'];
    if(isset($_POST['btn_edit_product'])){
        $p_name = $_POST['p_name'];
        $slug = $_POST['slug'];
        $code = $_POST['code'];
        $price = $_POST['price'];
        $leftover_p = $_POST['leftover_product'];
        $desc = $_POST['desc'];
        $status = $_POST['status'];
        $content = $_POST['content'];
        $upload_dir = 'uploads/products/';
        $upload_file = $upload_dir . $_FILES['file']['name'];
         move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'p_name' => $p_name,
                'slug' => $slug,
                'price' => $price,
                'leftover_product' => $leftover_p,
                'product_desc' => $desc,
                'p_content' => $content,
                'upload_file' => $upload_file,
                'status' => $status,
                'update_at' => time(),
                'code' => $code
            );
           edit_product($data, $id);
            $_SESSION['product_edit'] = "Cập nhật sản phẩm thành công";
        }
    load_view('edit_p'); 
    
}

function deleteAction(){
    $id = (int)$_GET['id'];
    delete_product($id);
    redirect("?mod=product&action=list_product");
}

//cat_product
function list_catAction() {
    load_view('list_cat');
}

function add_catAction() {
   global $error;
   if(isset($_POST['btn-add-cat'])){
       $error = array();
       if(empty($_POST['cat-title'])){
           $error['cat-title'] = "Chưa có tên danh mục";
       }else{
           $cat_title = $_POST['cat-title'];
            $parent_id = $_POST['parent_id'];
       }
       
       if(empty($_POST['slug'])){
           $error['slug'] = "Chưa có link slug";
       }else{
           $slug = $_POST['slug'];
       }

       
       //kết quả
       
       if(empty($error)){
           $data = array(
               'cat_name' => $cat_title,
               'slug' => $slug,
               'parent_id' => $parent_id,
               'creator' => user_login(),
               'created_date' => time()
               
           );
          product_insert_cat($data);
          $_SESSION['add_cat_product'] = 'Thêm danh mục thành công';
       }
   }
    
    
    load_view('add_cat');
}

function edit_catAction(){
    $id = (int)$_GET['id'];
      if(isset($_POST['btn-edit-cat'])){
        $cat_title = $_POST['cat-title'];
        $parent_id = $_POST['parent_id']; 
        $slug = $_POST['slug'];
         $data = array(
               'cat_name' => $cat_title,
               'slug' => $slug,
               'parent_id' => $parent_id,
               'update_at' => time()
           );
         edit_cat($data,$id);
      }
    
    $get_cat = get_rows_cat($id);
    $data['get_cat'] = $get_cat;
    load_view('edit_cat', $data);
}
function delete_catAction(){
   $id = (int)$_GET['id'];
   delete_cat($id);
   redirect('?mod=product&action=list_cat');
}