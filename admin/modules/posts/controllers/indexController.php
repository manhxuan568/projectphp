<?php

function construct() {
    load_model('index');
    
}
//trang list_post
function indexAction(){
     global $error,$success;
    //Xử lý tác vụ
    if(isset($_POST['btn_action'])){
        $error = array();
        $success = array();
        if(empty($_POST['actions'])){
            $error['actions'] = "Chưa chọn tác vụ!";
        }else{
            $actions = $_POST['actions'];
        }
        
         if(empty($_POST['check'])){
            $error['check'] = "Chưa chọn đối tượng nào!";
        }else{
            $check = $_POST['check'];
        }
        //kết quả
        if(empty($error)){
            //Để lấy giá trị của checkbox name[] thì ta cần duyệt mảng
            foreach ($check as $item){   
            $data = array(
                'status' => $actions
            );
          update_post_status($data, $item);  
            }
          $success['update_status'] = "Cập nhập tác vụ thành công";
        }
    }
     
    $num_rows = db_num_rows("SELECT * FROM `tbl_posts`");
    $num_per_page = 4;
    $total_rows = $num_rows;
    $num_page = ceil($total_rows/$num_per_page);
    $page = isset($_GET['page'])?$_GET['page']:1;
    $start = ($page - 1)* $num_per_page;
    
     //search_cat
       if(isset($_POST['btn_search'])){
         $search = $_POST['search_info_table'];
     $list_post = get_post($start, $num_per_page, "`cat_name` = '{$search}'");
     }   
     //get_status
     if(!empty($_GET['status'])){
         $status = $_GET['status'];
          $list_post = get_post($start, $num_per_page, "`status` = '{$status}'");
   
     }else{
         $list_post = get_post($start, $num_per_page);
     }
     //đếm tổn số bản ghi có trướng ['status]
    
     $num_rows_pending = db_num_rows("SELECT* FROM `tbl_posts` WHERE `status` = 'pending'");
    $num_rows_public = db_num_rows("SELECT* FROM `tbl_posts` WHERE `status` = 'public'");
    $num_rows_trash = db_num_rows("SELECT* FROM `tbl_posts` WHERE `status` = 'trash'");
    //data chuyển sang view
    $data['num_rows_public'] = $num_rows_public;
    $data['num_rows_pending'] = $num_rows_pending;
    $data['num_rows_trash'] = $num_rows_trash;
    $data['num_page'] = $num_page;
    $data['page']= $page;
    $data['num_rows'] = $num_rows;
    $data['start'] = $start;
    $data['list_post'] = $list_post;
     load_view('list_post', $data);
}

function add_postAction(){
    global $error, $success;
    
    if(isset($_POST['btn-update'])){
        $error = array();
        //title
         if(empty($_POST['title'])){
          $error['title'] = "Chưa có tiêu đề của bài viết!";
         }else{
          $title = $_POST['title'];
         }      
       
      //slug
      if(empty($_POST['slug'])){
          $error['slug'] = "Chưa có link slug!";
      }else{
          $slug = $_POST['slug'];
      }
       //desc
      if(empty($_POST['desc'])){
          $error['desc'] = "Chưa có đoạn mô tả!";
      }else{
          $desc = $_POST['desc'];
      }
      
      //content
      if(empty($_POST['content'])){
          $error['content'] = "Chưa có nội dung bài viết!";
      }else{
          $content = $_POST['content'];
      }
      //category
           if(empty($_POST['category'])){
         $error['category'] = 'Bạn chưa chọn danh mục';
          }else{
         $category = $_POST['category'];
          } 
      //upload_file
      
         if(isset($_FILES['file'])){
//      $error= array();
    $upload_dir = 'uploads/posts/';
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
      }
      
     // kết quả
     if(empty($error)){
         move_uploaded_file($_FILES['file']['tmp_name'], $upload_file); 
         $data = array(
             'post_title' => $title,
             'post_desc' => $desc,
             'post_content' => $content,
             'cat_id' => $category,
             'created_date' => time(),
             'file_url' => $upload_file,
             'slug_url' => $slug,
             'creator' => user_login()
         );
       post_insert_into($data);
       $success['post'] = "Thêm bài viết thành công";
     }
     
    }
    
    load_view('add_post');
}

function updateAction(){
     global $error, $success;
    
    if(isset($_POST['btn-update'])){
        $error = array();
        //title
         if(empty($_POST['title'])){
          $error['title'] = "Chưa có tiêu đề của bài viết!";
         }else{
          $title = $_POST['title'];
         }      
       
      //slug
      if(empty($_POST['slug'])){
          $error['slug'] = "Chưa có link slug!";
      }else{
          $slug = $_POST['slug'];
      }
       //desc
      if(empty($_POST['desc'])){
          $error['desc'] = "Chưa có đoạn mô tả!";
      }else{
          $desc = $_POST['desc'];
      }
      
      //content
      if(empty($_POST['content'])){
          $error['content'] = "Chưa có nội dung bài viết!";
      }else{
          $content = $_POST['content'];
      }
      //category
           if(empty($_POST['category'])){
         $error['category'] = 'Bạn chưa chọn danh mục';
          }else{
         $category = $_POST['category'];
          } 
      //upload_file
      
         if(isset($_FILES['file'])){
//      $error= array();
    $upload_dir = 'uploads/posts/';
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
      }
      
     // kết quả
     if(empty($error)){
          $id = (int)$_GET['id'];
         move_uploaded_file($_FILES['file']['tmp_name'], $upload_file); 
         $data = array(
             'post_title' => $title,
             'post_desc' => $desc,
             'post_content' => $content,
             'cat_id' => $category,
             'created_date' => time(),
             'file_url' => $upload_file,
             'slug_url' => $slug,
             'creator' => user_login()
         );
       post_update_id($data, $id);
       $success['update'] = "Cập nhập bài viết thành công";
     }
     
    }
    
    
      $id = (int)$_GET['id'];
    $update_post = update_post($id);
    $data['update_post'] = $update_post;
    load_view('update', $data);
}
function deleteAction(){
   $id = (int)$_GET['id'];
   db_delete('tbl_posts', "`id` = '{$id}'");
   redirect("?mod=posts");
}

function list_catAction(){
    
    
    load_view('list_cat');
}
function add_catAction(){
    global $error, $success;
    if(isset($_POST['btn-submit'])){
        $error = array();
        $success = array();
        if(empty($_POST['cat_name'])){
            $error['cat_name'] = 'Không để trống tên danh mục';
        }else{
            $cat_name = $_POST['cat_name'];
        }
        if(empty($_POST['slug'])){
            $error['slug'] = 'Chưa có link slug';
        }else{
            $slug = $_POST['slug'];
        }
        
        if(empty($error)){
            $data = array(
                'cat_name' => $cat_name,
                'slug' => $slug,
                'creator' => user_login(),
                'created_date' => time()
            );
            post_cat_insert_into($data);
            $_SESSION['cat_name'] = "Thêm danh mục thành công";
        }
    }

   
    
    load_view('add_cat');
}

function update_catAction(){
    $id = (int)$_GET['id'];
    if(isset($_POST['btn-update-cat'])){
        $update_cat_name = $_POST['cat_name'];
        $update_slug = $_POST['slug'];
        
        $data= array(
          'cat_name' => $update_cat_name, 
          'slug' => $update_slug,
          'update_date' => time()
        );
        
        if(update_cat($data,$id)){
        $_SESSION['update_cat'] = "Cập nhật thành công";
        }
    }
    load_view('update_cat');
}