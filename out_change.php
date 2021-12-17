<?php
//调用文件连接数据库
require_once('connt.php');
//POST获取值并赋值
$id = $_POST['id'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];
$time = date('Y-m-d');
session_start();

//拿到title的id
$id1 =$link->query("select id from category where title='{$title}'");
foreach ($id1 as $key => $value) {
    foreach ($value as $k => $v) {
      $arr[$k] = $v;
    }
$cid=$arr['id'];

}
echo $cid;
//写入明细
$result = $link->query("update booking set cid='$cid',type='-1',amount='$amount',remark='$remark' where id1='$id'");

if(!$result){
  echo"<script>alert('数据错误');location='index.php'</script>";
}
else{
  header('location:index.php');
}
?>