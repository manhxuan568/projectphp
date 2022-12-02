<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
  
    load_model('index');
    
}


function add_pageAction() {
    global $error, $success;
    if(isset($_POST['btn-update'])){
        //cờ hiệu
        $error = array();
        //page_name
      if(empty($_POST['page_name'])){
          $error['page_name'] = "Không được để trống tên trang!";
      }else{
          $page_name = $_POST['page_name'];
      }      
       
      //page_title
      if(empty($_POST['page_title'])){
          $error['page_title'] = "Không để trống tiêu đề trang!";
      }else{
          $page_title = $_POST['page_title'];
      }
       //slug_url
      if(empty($_POST['slug_url'])){
          $error['slug_url'] = "Chưa có link slug friendly_url!";
      }else{
          $slug_url = $_POST['slug_url'];
      }
      
      //content
      if(empty($_POST['content'])){
          $error['content'] = "Chưa có nội dung trang!";
      }else{
          $content = $_POST['content'];
      }
      
      //file_upload
      if(isset($_FILES['file'])){
//      $error= array();
    $upload_dir = 'uploads/';
    // Đường dẫn của file sửa khi upload
    $upload_file = $upload_dir.$_FILES['file']['name'];       
  //Xử lý upload dúng file ảnh
  $type_allow = array('png', 'jpg', 'gif', 'jpeg');
  $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  if(!in_array(strtolower($type), $type_allow)){
      $error['type']= 'Chỉ được upload file có đuôi png, jpg, gif, jpeg'; //điều kiện 1
  } else {
    #Upload file có kích thước cho phép (<20MB ~ 29.000.000 Byte)
  $file_size = $_FILES['file']['size'];
  if($file_size > 29000000){ // điều kiện 2
      $error['file_size'] = 'Chỉ được upload file bé hơn 20MB';
  } 
   #Kiểm tra trùng file trên hệ thống;
  if(file_exists($upload_file)){ // điều kiện 3
    //  $error['file_exists'] = 'File đã tồn tại trên hệ thống';
      $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
      $new_file_name = $file_name."- copy.";
      $new_upload_name = $upload_dir.$new_file_name.$type;
      $k=1;
      while (file_exists($new_upload_name)){
          $new_file_name = $file_name."- copy{$k}.";
          $k++;
          $new_upload_name = $upload_dir.$new_file_name.$type;
      }
      $upload_file = $new_upload_name;
  } 
  
  }
  // Thư mục chứa file upload
//      if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)){
//        $file_img = "<img src='$upload_file'/><br> Upload success: <a href='$upload_file'>Dowload:{$_FILES['file']['name']}</a>"; }
     
      }
          
     //end_upload
      //kết quả
      if(empty($error)){
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_file); 
       $data = array(
           'page_name' => $page_name,
           'page_title' => $page_title,
           'slug_url' => $slug_url,
           'page_content' => $content,
           'file_img' => $upload_file,
           'created_date' => time(),
           'creator' => user_login()
       );    
        add_insert_page($data); 
       $success['pages'] = "Thêm trang thành công!";
      }
    }
    
    load_view('add_page');
}
function indexAction() {
    global $error;
    
    
    //Xử lý tác vụ
   if(isset($_POST['btn_action'])){
       $error = array();
       $actions = $_POST['actions'];

       if(empty($_POST['cat'])){
           $error['cat'] = 'Bạn chưa chọn đối tượng nào';
       }else{
           $cat = $_POST['cat'];

       }
//    
       if(empty($error)){
           $data = array(
               'status' => $actions
           );
          update_status($data, $cat); 
       }
   }
 

   
$num_rows = db_num_rows("SELECT* FROM `tbl_pages`");
$num_per_page = 4;
$total_rows = $num_rows;
$num_page = ceil($total_rows/$num_per_page);
$page = isset($_GET['page'])?$_GET['page']:1;
//Start tính tổng để lấy điểm miền xuất phát của bản ghi
$start = ($page - 1)* $num_per_page;

//Xử lý $_GET['status']
if(!empty($_GET['status'])){
    $status = $_GET['status'];
  $list_pages = get_pages($start, $num_per_page, "`status` = '{$status}'"); 
}else{
   $list_pages = get_pages($start, $num_per_page); 
}
//Tìm kiếm search theo page_name
if(isset($_POST['search_page'])){
    $find_page = $_POST['find_page'];
    $list_pages = get_pages($start, $num_per_page, "`page_name` = '{$find_page}'"); 
}

 $num_rows_pending = db_num_rows("SELECT* FROM `tbl_pages` WHERE `status` = 'pending'");
 $num_rows_public = db_num_rows("SELECT* FROM `tbl_pages` WHERE `status` = 'public'");
 $num_rows_trash = db_num_rows("SELECT* FROM `tbl_pages` WHERE `status` = 'trash'");
$data['list_pages'] = $list_pages;
$data['num_rows'] = $num_rows;
$data['num_rows_public'] = $num_rows_public;
$data['num_rows_pending'] = $num_rows_pending;
$data['num_rows_trash'] = $num_rows_trash;
$data['start'] = $start;
$data['page'] = $page;
$data['num_page'] = $num_page;
    load_view('list_page', $data);
}


function deleteAction(){
   $page_id = $_GET['page_id'];
    if(delete_page($page_id)){
        redirect("?mod=page"); 
    }
    
}

function updateAction(){
  $page_id = $_GET['page_id'];
   
   global $error, $success;
    if(isset($_POST['btn-update'])){
        //cờ hiệu
        $error = array();
        //page_name
      if(empty($_POST['page_name'])){
          $error['page_name'] = "Không được để trống tên trang!";
      }else{
          $page_name = $_POST['page_name'];
      }      
       
      //page_title
      if(empty($_POST['page_title'])){
          $error['page_title'] = "Không để trống tiêu đề trang!";
      }else{
          $page_title = $_POST['page_title'];
      }
       //slug_url
      if(empty($_POST['slug_url'])){
          $error['slug_url'] = "Chưa có link slug friendly_url!";
      }else{
          $slug_url = $_POST['slug_url'];
      }
      
      //content
      if(empty($_POST['content'])){
          $error['content'] = "Chưa có nội dung trang!";
      }else{
          $content = $_POST['content'];
      }
      
      //file_upload
      if(isset($_FILES['file'])){
//      $error= array();
    $upload_dir = 'uploads/';
    // Đường dẫn của file sửa khi upload
    $upload_file = $upload_dir.$_FILES['file']['name'];       
  //Xử lý upload dúng file ảnh
  $type_allow = array('png', 'jpg', 'gif', 'jpeg');
  $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
  if(!in_array(strtolower($type), $type_allow)){
      $error['type']= 'Chỉ được upload file có đuôi png, jpg, gif, jpeg'; //điều kiện 1
  } else {
    #Upload file có kích thước cho phép (<20MB ~ 29.000.000 Byte)
  $file_size = $_FILES['file']['size'];
  if($file_size > 29000000){ // điều kiện 2
      $error['file_size'] = 'Chỉ được upload file bé hơn 20MB';
  } 
   #Kiểm tra trùng file trên hệ thống;
  if(file_exists($upload_file)){ // điều kiện 3
    //  $error['file_exists'] = 'File đã tồn tại trên hệ thống';
      $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
      $new_file_name = $file_name."- copy.";
      $new_upload_name = $upload_dir.$new_file_name.$type;
      $k=1;
      while (file_exists($new_upload_name)){
          $new_file_name = $file_name."- copy{$k}.";
          $k++;
          $new_upload_name = $upload_dir.$new_file_name.$type;
      }
      $upload_file = $new_upload_name;
  } 
  
  }
  // Thư mục chứa file upload
//      if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)){
//        $file_img = "<img src='$upload_file'/><br> Upload success: <a href='$upload_file'>Dowload:{$_FILES['file']['name']}</a>"; }
     
      }
          
     //end_upload
      //kết quả
      if(empty($error)){
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_file); 
       $data = array(
           'page_name' => $page_name,
           'page_title' => $page_title,
           'slug_url' => $slug_url,
           'page_content' => $content,
           'file_img' => $upload_file,
           'created_date' => time(),
           'creator' => user_login()
       );    
       update_page($data, $page_id); 
       $success['pages'] = "Cập nhật bản ghi thành công!";
      }
    }
   
  $update_info_page = get_page_by_id($page_id);
  $data['update_info_page'] = $update_info_page;
  load_view('update', $data);
}


