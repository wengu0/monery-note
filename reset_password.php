
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />  
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
 
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	

</head>
<body>
<?php
require_once('connt.php');
session_start();
$username = $_POST['username'];
$used_password = $_POST['used_password'];
$new_password1 = $_POST['new_password1'];
$new_password2 = $_POST['new_password2']; 

$res = $link->query("select* from user where username ='{$_SESSION["username"]}'");
foreach ($res as $key => $value) {
	foreach ($value as $k => $v) {
			$arr[$k] = $v;
			
				  }
			$password = $arr['password'];
                }

			

	if (!filled_out($_POST)) {
    echo "<script>mui.plusReady(function(){  
      mui.alert('没有填写完整',function () {
        window.location.href='account.php'});
         });</script>";
    }
	else{
		if ($password !== $used_password) {
    echo "<script>mui.plusReady(function(){
	     mui.alert('旧密码错误！',function () {
	       window.location.href='account.php'});
	        });</script>"; 
			}
		else{
			if ($new_password1 !== $new_password2) {
      echo "<script>mui.plusReady(function(){
  	     mui.alert('两次密码不同！',function () {
  	       window.location.href='account.php'});
  	        });</script>";
			
		}else{
			$res = $link->query("update user set password='{$new_password1}'where username='{$username}'");
			
			header('location:index.php');
		}
	}                
	}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   


?>
</body>