
<?php
require_once('connt.php');

$title = $_POST['title'];
$amount = $_POST['amount'];
$remark = $_POST['remark'];
$time = date('Y-m-d');

session_start();
$id =$link->query("select id from category where title='{$title}'");
foreach ($id as $key => $value) {
    foreach ($value as $k => $v) {
      $arr[$k] = $v;
    }
$cid=$arr['id'];
}
$id2 =$link->query("select id from user where username='{$_SESSION['username']}'");
foreach ($id2 as $key => $value) {
    foreach ($value as $k => $v) {
      $arr[$k] = $v;
    }
$aid=$arr['id'];
}

if (!filled_out($_POST)) {
    echo "<script>alert('表单没有填写完整')location='newbooking.php'</script>";
  }
else {

    $result = $link->query("insert into booking values('','".$aid."','".$cid."', '-1','".$amount."', '".$time."','".$remark."')");
    header('location:index.php');
  if(!$result){
      echo '写入数据库有误';
  }
}
?>