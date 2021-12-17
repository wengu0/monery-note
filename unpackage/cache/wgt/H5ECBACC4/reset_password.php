<?php
require_once('connt.php');
session_start();
$username = $_POST['username'];
$used_password = $_POST['used_password'];
$new_password1 = $_POST['new_password1'];
$new_password2 = $_POST['new_password2'];
$conn = $link->query("select* from user where username like '{$_SESSION["username"]}'");
foreach ($conn as $key => $value) {
  					foreach ($value as $k => $v) {
    					$arr[$k] = $v;
  					}
  				$password1=$arr['password'];
                }
$result=$link->query("update user set password=replace(password,'{$used_password}','{$new_password1}') where username = '{$username}'");

if ($new_password1 !== $new_password2) {
    echo "<script>alert('两次输入的密码不一致，请重新输入！');location='account.php'</script>";
}
if($used_password!==$password1){
    echo"<script>alert('旧密码错误');location='account.php'</script>";
}
if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$new_password1)){
    echo "<script>alert('密码包含非法字符或长度错误，请重新输入！');location='account.php'</script>";
}
if(!preg_match("/^[A-Za-z0-9_]{6,16}+$/u",$new_password2)){
    echo "<script>alert('密码包含非法字符或长度错误，请重新输入！');location='account.php'</script>";
}
if ($result){
    header('location:login.php');
}
else{
    echo "<script>alert('写入数据错误！');location='account.php'</script>";
}



?>