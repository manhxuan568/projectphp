

<?php

function construct() {
    load_model('index');
    load('lib', 'sendmail');
  
   
}



  //Action xử lý Login khi đăng ký xong
function loginAction() {
    global $username, $password, $error;
    if(isset($_POST['btn-login'])){
        
        $error = array();
        //sử lý username
         if(empty($_POST['username'])){
            $error['username']= "Không được để trống tên đăng nhập!";
        } else {
        if(is_username($_POST['username'])){
            $error['username']= "Tên đăng nhập của bạn chưa theo yêu cầu!";
        } else {
          $username = $_POST['username'];    
        }    
       }
       
       //Xử lý password
        if(empty($_POST['password'])){
            $error['password']= "Không được để trống mật khẩu!";
        } else {
        if(is_password($_POST['password'])){
            $error['password'] = "Mật khẩu của bạn chưa theo yêu cầu!";
        } else {
          $password = md5($_POST['password']);    
        }    
       }
       //Kết quả
       if(empty($error)){
           if(check_login_db($username, $password)){
               setcookie('is_login', true, time() +3600);
               setcookie('user_login', $username, time() +3600);
              $_SESSION['is_login'] = true;
              $_SESSION['user_login'] = $username;
             if(isset($_SESSION['user_login'])){
                 $data = array('status_online' => 'on');
                 update_status_online($data, $_SESSION['user_login']);
             }
//             else {
//                 unset($_SESSION['user_login']);
//                
//             }
              redirect("?mod=posts");
           } else {
           $error['account']= "Tài khoản hoặc mật khẩu không chính xác!";    
           }
       }
       
       
    }
    
    load_view('login');
}

 //Action xử lý logout khi đăng xuất
function logoutAction(){
      $data = array('status_online' => 'off');
      update_status_online($data, $_SESSION['user_login']);
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
      setcookie('is_login', true, time() -3600);
      setcookie('user_login', $username, time() -3600);
    redirect("?mod=users&action=login"); 
}


// Action quen mật khẩu

function reset_passAction (){
    global $error, $email, $password;
    if(!empty($_GET['reset_token'])){
            $reset_token = $_GET['reset_token'];
        if(check_reset_token($reset_token))
        if(isset($_POST['btn-new-pass'])){
            //Xử lý password
        if(empty($_POST['password'])){
            $error['password']= "Không được để trống mật khẩu";
        } else {
        if(is_password($_POST['password'])){
            $error['password'] = "Mật khẩu của bạn chưa đúng đinh dạng";
        } else {
          $password = md5($_POST['password']);    
        }    
       }
          if(empty($error)){
              $data = array(
                  'password' => $password
              );
              update_pass($data, $reset_token);
              redirect("?mod=users&action=resetOk");
          }
        }
         load_view('newPass');    
    }else{
        // kiểm tra email mà cập nhật mã kích hoạt và thêm vào email và db
         if(isset($_POST['btn-reset'])){
        
        //Cờ hiệu
        $error = array();
          //Xử lý email
        if(empty($_POST['email'])){
            $error['email']= "Không được để trống email";
        } else {
        if(!is_email($_POST['email'])){
            $error['email']= "Email của bạn chưa theo yêu cầu";
        } else {
          $email = $_POST['email'];    
        }    
       }
       if(empty($error)){
           if(check_email($email)){
              $reset_token = md5($email.time());
               $data = array(
                   'reset_token' => $reset_token
               );
               // thêm mã vào db
              update_reset_token($data, $email); 
              $link = base_url("?mod=users&action=reset_pass&reset_token={$reset_token}");
              $content = "Xác thực tài khoản thành công bạn nhấn vào đây để thay đổi mật khẩu: {$link} <br>
                Nếu yêu cầu này không phải của bạn vui lòng bỏ qua email này " ;
              send_mail('manhxuan568@gmail.com', '', 'Mã khôi phục tài khoản PHP MASTER', $content);
              redirect("?mod=users&action=confirm_email_success");
           }else{
          $error['account'] = "Đây không phải tài khoản email bạn đã đăng ký trên hệ thống!";     
       }
       }
    }
    load_view('reset_pass');
    }
    

}

function resetOkAction(){
    load_view('resetOk');
}
function confirm_email_successAction(){
    load_view('confirm_email_success');
}


function info_accountAction (){
    if(isset($_POST['btn-submit'])){
        
        global $error, $email;
        $error = array();
        //fullname
      if(empty($_POST['fullname'])){
          $error['fullname'] = "Bạn chưa điền tên hiển thị";
      } else {
         $fullname = $_POST['fullname'];    
      } 
      
      // email
        if(empty($_POST['email'])){
            $error['email']= "Không được để trống email";
        } else {
        if(!is_email($_POST['email'])){
            $error['email']= "Email của bạn chưa theo yêu cầu";
        } else {
          $email = $_POST['email'];    
        }    
       }
      
      //số điện thoại
      if(empty($_POST['number_phone'])){
          $error['number_phone']= "Bạn chưa có số điện thoại";
      } else {
        $number_phone = $_POST['number_phone'];    
      }
      
      // Địa chỉ
      if(empty($_POST['address'])){
          $error['address'] = "Bạn chưa có địa chỉ";
      } else {
         $address = $_POST['address']; 
      }
      
      //kết quả
      if(empty($error)){
          $data = array(
              'fullname' => $fullname,
              'email' => $email,
              'number_phone' => $number_phone,
              'address' => $address
          );
          update_user($data, $_SESSION['user_login']);
          $update_success = "<p class='success'>Bạn đã cập nhật thông tin thành công</p>";
          $data['update_success']= $update_success;
      }
      
    }
    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('info_account', $data);
    
}

//change_pass

function change_passAction(){
    
    global $error, $password, $success;
    $error = array();
    $success = array();
    if(isset($_POST['btn-change-pass'])){
        //pass_old
        if(empty($_POST['pass_old'])){
          $error['pass_old'] = "Bạn chưa điền mật khẩu cũ!";
      } else {
         $pass_old = md5($_POST['pass_old']);    
      }
        
      //new_pass
      if(empty($_POST['new_pass'])){
            $error['new_pass']= "Bạn chưa điền mật khẩu mới!";
        } else {
        if(is_password($_POST['new_pass'])){
            $error['new_pass'] = "Mật khẩu của bạn chưa đúng định dạng!";
        } else {
          $new_pass = md5($_POST['new_pass']);    
        }    
       }
        //confirm_pass
       if(empty($_POST['confirm_pass'])){
             $error['confirm_pass']= "Bạn chưa điền xác nhận mật khẩu mới!";
         } else {
         if(is_password($_POST['confirm_pass'])){
             $error['confirm_pass'] = "Mật khẩu của bạn chưa đúng định dạng!";
         } else {
           $confirm_pass = md5($_POST['confirm_pass']);    
         }    
        }
       //kết quả
       if(empty($error)){
           if(check_pass($pass_old) && $confirm_pass = $new_pass){
            $data = array(
                'password' => $confirm_pass
            );
            update_new_pass($data, $pass_old);
            $success['pass_new'] = "Thay đổi mật khẩu thành công!";
           } else {
           $error['confirm_pass_new']= "Mật khẩu mới và mật khẩu xác nhận không giống nhau!";
           $error['pass_old1']= "Bạn cần nhập đúng mật khẩu(cũ) để thay đổi!";    
           }
       }
       
    }
 
    load_view('change_pass');
}

function add_usersAction(){
    global $error;
    if(isset($_POST['btn-add-user'])){
        $error = array();
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Không để trống họ và tên!";
        }else{
            $fullname = $_POST['fullname'];
        }
        //
        if(empty($_POST['username'])){
            $error['username'] = "Không để trống tên đăng nhập!";
        }else{
            if(is_username($_POST['username'])){
                $error['username'] = "Tên đăng nhập của bạn chưa theo yêu cầu!";
            }else{
            $username = $_POST['username'];
            }
        }
        //
        if(empty($_POST['password'])){
            $error['password'] = "Không để trống mật khẩu!";
        }else{
            if(is_password($_POST['password'])){
                $error['password'] = "Mật khẩu của bạn chưa theo yêu cầu!";
            }else{
            $password = md5($_POST['password']);
            }
        }
        //
        if(empty($_POST['permission'])){
            $error['permission'] = "Bạn chưa chọn quyền quản lý!";
        }else{
            $permission = $_POST['permission'];
        }
        //
         if(empty($_POST['email'])){
            $error['email'] = "Không để trống email!";
        }else{
            if(!is_email($_POST['email'])){
                $error['email'] = "Email của bạn chưa theo yêu cầu!";
            }else{
            $email = $_POST['email'];
            }
        }
        //
        if(empty($_POST['number_phone'])){
            $error['number_phone'] = "Không để trống số điện thọai!";
        }else{
            $number_phone = $_POST['number_phone'];
        } 
        //
        if(empty($_POST['address'])){
            $error['address'] = "Chưa có địa chỉ!";
        }else{
            $address = $_POST['address'];
        }
        //Kết quả
        if(empty($error)){
            $data = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password,
            'number_phone' => $number_phone,
            'email' => $email,
            'address' => $address,
            'created_date' => time(),
            'permission' => $permission,
            'creator' => user_login(),
            );
            add_users_insert($data);
            $_SESSION['add_user'] = "Thêm tài khoản thành công!";
        }
    }
    
    load_view('add_users');
}




