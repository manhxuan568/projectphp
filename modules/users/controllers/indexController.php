

<?php

function construct() {
    load_model('index');
    load('lib', 'sendmail');
  
   
}

function regAction() {
    global $username, $password, $fullname, $email, $error;
    if(isset($_POST['btn-register'])){
        $error = array();
        //Xử lý fullname
        if(empty($_POST['fullname'])){
            $error['fullname']= "Không được để trống họ và tên";
        } else {
        $fullname = $_POST['fullname'];    
        }
        
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
       
        //Xử lý username
        if(empty($_POST['username'])){
            $error['username']= "Không được để trống tên đăng nhập";
        } else {
        if(is_username($_POST['username'])){
            $error['username']= "Tên đăng nhập của bạn chưa theo yêu cầu";
        } else {
          $username = $_POST['username'];    
        }    
       }
       
       //Xử lý password
        if(empty($_POST['password'])){
            $error['password']= "Không được để trống mật khẩu";
        } else {
        if(is_password($_POST['password'])){
            $error['password'] = "Mật khẩu của bạn chưa theo yêu cầu";
        } else {
          $password = md5($_POST['password']);    
        }    
       }
       
       // Kết quả
       if(empty($error)){
           //kiểm tra người dùng dã có trên sql qua điều kiện email, username
           if(!user_exists($email, $username)){
               $active_token = md5($username.time());
               $data = array(
                   'email' => $email,
                   'fullname' => $fullname,
                   'username' => $username,
                   'password' => $password,
                   'active_token' => $active_token  
               );
               //Thêm bản ghi đăng mới và chuyển hướng khách hàng
               add_user($data);
               $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
               $content = "<p>Chào bạn Nguyễn Văn A</p>
                            <p>Bạn vui lòng clicks vào link này để kích hoạt tài khoản: {$link_active}</p>
                            <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này</p>
                            <p>team support unitop.com</p>";
              send_mail('manhxuan568@gmail.com', 'nguyễn xuân hùng', 'Kích hoạt tài khoản PHP MASTER', $content);
                //chuyển hướng người dùng khi đăng ký thành công
               redirect('?mod=users&action=reg_success');
           } else {
               $error['account']= "Tên đăng nhập hoặc email của bạn đã có";
           } 
       } 
       
    }
    load_view('reg');
}

//Action gửi đăng ký thành công 
function reg_successAction(){
    echo "<strong>Chúc mừng bạn đã đăng ký thành công</strong><br>
    Mã kích hoạt tài khoản được gửi vào trong email của bạn vui lòng xác nhận.<br>
    Và mã kích hoạt sẽ hết hiệu lực sau 15 phút nữa";
}

 //Action xử lý khi người dùng gửi mã xác nhận vào hệ thống và get xuống
function activeAction(){
    //Bên lấy mã kích hoạt từ url xuống và xứ lý so sách với active_token bên trong database để kính hoạt tài khoản
    $active_token = $_GET['active_token'];
    if(check_active_token($active_token)){
        $link_login = base_url("?mod=users&action=login");
         active_users($active_token);
         echo "Kích hoạt thành công!<br> Bạn nhấn vào đây để đăng nhập tài khoản: <a href='{$link_login}'>Đăng nhập</a>";
    } else {
     echo "Kích hoạt không thành công hoặc tài khoản đã được kích hoạt rồi";   
    }
  
}


  //Action xử lý Login khi đăng ký xong
function loginAction() {
    global $username, $password, $error;
    if(isset($_POST['btn-login'])){
        
        $error = array();
        //sử lý username
         if(empty($_POST['username'])){
            $error['username']= "Không được để trống tên đăng nhập";
        } else {
        if(is_username($_POST['username'])){
            $error['username']= "Tên đăng nhập của bạn chưa theo yêu cầu";
        } else {
          $username = $_POST['username'];    
        }    
       }
       
       //Xử lý password
        if(empty($_POST['password'])){
            $error['password']= "Không được để trống mật khẩu";
        } else {
        if(is_password($_POST['password'])){
            $error['password'] = "Mật khẩu của bạn chưa theo yêu cầu";
        } else {
          $password = md5($_POST['password']);    
        }    
       }
       //Kết quả
       if(empty($error)){
           if(check_login_db($username, $password)){
              $_SESSION['is_login'] = true;
              $_SESSION['user_login'] = $username;
              redirect("?");
           } else {
           $error['account']= "Tài khoản hoặc mật khẩu không chính xác";    
           }
       }
       
       
    }
    
    load_view('login');
}

 //Action xử lý logout khi đăng xuất
function logoutAction(){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
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
              send_mail('manhxuan568@gmail.com', '', 'Mã xác thực tài khoản PHP master', $content);
              redirect("?mod=users&action=confirm_email_success");
           }else{
          $error['account'] = "Tài khoản email của bạn chưa có trên hệ thống";     
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





