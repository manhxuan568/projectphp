<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action().'Action';

call_function(array('construct', $action_name));


// Kiểm tra khi người dung chưa login
if(!is_login() && get_action() != 'login' && get_action() != 'active' && get_action() != 'confirm_email_success' && get_action() != 'newPass' && get_action() != 'resetOk' && get_action() != 'reset_pass'){
    redirect("?mod=users&action=login");
}

