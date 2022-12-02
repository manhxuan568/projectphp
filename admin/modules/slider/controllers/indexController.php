<?php

function construct() {
    load_model('index');
}

function indexAction(){
 
}

function add_sliderAction(){
    global $error;
    if(isset($_POST['btn-add-slider'])){
        $error = array();
        //slider
        if(empty($_POST['slider'])){
            $error['slider']= "Không để trống tên slider";
        }else{
            $slider = $_POST['slider'];
        }
        //link
        if(empty($_POST['slug'])){
            $error['slug']= "Không để trống link";
        }else{
            $slug = $_POST['slug'];
        }
        //thứ tự
        if(empty($_POST['num_order'])){
            $error['num_order']= "Không điền thứ tự thì slider sẽ chạy cuối cùng";
        }else{
            $num_order = $_POST['num_order'];
        }
        //hình ảnh
                        if (isset($_FILES['file'])) {
//      $error= array();
            $upload_dir = 'uploads/slider/';
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
        //status
      if(empty($_POST['status'])){
            $error['status']= "Mặc định trạng thái là chờ duyệt nếu bạn không chọn";
        }else{
            $status = $_POST['status'];
        }
        //kết quả
        if(empty($error)){
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);
            $data = array(
                'slider_name' => $slider,
                'link'=> $slug,
                'num_order'=> $num_order,
                'status'=> $status,
                'created_date'=> time(),
                'creator'=> user_login(),
                'file_img'=> $upload_file
            );
          slider_insert($data);
          $_SESSION['slider'] = "Thêm mới slider thành công";
        }
    }


    load_view('add_slider');
}
function list_sliderAction(){
   global $error;
    if(isset($_POST['sm_action'])){
        $error = array();
        if(empty($_POST['actions'])){
            $error['actions']= "Bạn chưa chọn tác vụ!";
        }else{
            $actions = $_POST['actions'];
        }
        if(empty($_POST['checkitem'])){
            $error['checkitem']= "Bạn chưa chọn đối tượng nào!";
        }else{
            $checkitem = $_POST['checkitem'];
        }
        if(empty($error)){
            foreach ($checkitem as $item){
                $data = array(
                    'status'=> $actions
                );
                update_slider($data,$item);
            }
            $_SESSION['slider_up']= "Cập nhật thành công";
        }
    }
     load_view('list_slider');
}
function add_catAction(){
    load_view('add_cat');
}
function editAction(){
    $id = (int)$_GET($id);
    if(isset($_POST['btn-edit-slider'])){
        $slider = $_POST['slider'];
         $slug = $_POST['slug'];
         $num_order = $_POST['num_order'];
         $status = $_POST['status'];
        $data = array(
                'slider_name' => $slider,
                'link'=> $slug,
                'num_order'=> $num_order,
                'status'=> $status,
               
            ); 
            update_slider($id);
    }
    load_view('edit_slider');
}

function deleteAction(){
    $id = (int)$_GET['id'];
    delete_slider($id);
    redirect("?mod=slider&action=list_slider");
    
}