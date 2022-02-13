<!-- 引用外部文件使它可以在app端有弹窗 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />  
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
	

</head>
<body>
<?php
require_once('connt.php');
session_start();
//获取用户名和密码
$username = $_POST['username'];
$password = $_POST['password'];

//向数据库匹配用户名和密码

$result=$link->query("select id,username,password from user where username='$username' and password='$password';");


if (!$result) {
    echo"<script>
	mui.plusReady(function(){  
	     mui.alert('登录名或密码错误！',function () {
	       window.location.href='login.php'});
	        });
</script>";
}
if ($result->num_rows>0) {
    //将session赋值用户名
    $_SESSION['username'] = $username;
    $_SESSION['islogin'] = 1;
    header('Location:home.php');
} else {
    echo"<script>
	mui.plusReady(function(){  
	     mui.alert('登录名或密码错误！',function () {
	       window.location.href='login.php'});
	        });

    </script>";
}

?>
</body>