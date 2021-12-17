<?php 
//连接数据库
$link = mysqli_connect('localhost', 'root', '', 'users');
$link->set_charset("utf8");

//定义连接数据库函数
function db_connect() {
    $link = new mysqli('localhost', 'root', '', 'users');
    $link->set_charset("utf8");
    if (!$link) {
        throw new Exception('不能连接到数据库！');
    } else {
        return $link;
    }
}

//验证用户是否存在
function register($username, $email, $password,$name) {
    $conn = db_connect();
    
    $result = $conn->query("select * from user where username='".$username."'");
    if (!$result) {
        throw new Exception('无法执行查询，请重试！');
        
    }

    if ($result->num_rows>0) {
        throw new Exception('用户名已存在，请重新填写！');
    }
    $result = $conn->query("insert into user values('','".$username."', '".$password."','".$name."', '".$email."')");
    if (!$result) {
        throw new Exception('存入数据库时出错，请重试！');
    }
    return true;
}
//验证表单是否为空
function filled_out($form_vars) {

    foreach ($form_vars as $key => $value) {
        if ((!isset($key)) || ($value == '')) {
            return false;
        }
    }
    return true;
}
//验证邮箱
function valid_email($address) {
    if (preg_match('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$^', $address)) {
        return true;
    } else {
        return false;
    }
}

?>