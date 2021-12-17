<?php

// 导入函数库
require_once('connt.php');
session_start();


//注销会话
unset($_SESSION['username']);
$result_dest = session_destroy();


if (empty($old_user)) {
  if ($result_dest)  {
    header('Location:login.php');
  } else {

    echo"<script>alert('退出登录错误');location='login.php'</script>";
  }
}


?>