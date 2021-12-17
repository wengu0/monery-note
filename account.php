<?php
require_once('connt.php');
session_start();
$result=$link->query("select* from user where username like '{$_SESSION["username"]}'");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    <link rel="stylesheet" href="bootstrap/css/spacelab.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
     
   
</head>
<body>
<header class="mui-bar mui-bar-nav mui-bar-nav-bg">
    <a id="icon-menu" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <a class="mui-action-back mui-icon  mui-pull-right mui-a-color"></a>
    <h1 class="mui-title">个人信息</h1>
</header>
<div style="background:url('bc.png') no-repeat;width:500px;height:170px"></div>
</body>

<?php

foreach ($result as $key => $value) {
  					foreach ($value as $k => $v) {
    					$arr[$k] = $v;
  					}
  				$username = $arr['username'];
                $email = $arr['email'];
                $name = $arr['name'];
				}

?>
<form action="reset_password.php"method="post">
			<div id="input_example" class="mui-input-group" style="margin-top: 30px;">
			    <div class="mui-input-row">
                    <label>用户名：</label>
                    <input name="username" id="username" type="text" class="mui-input-clear" value="<?php echo $username?> ">
                </div>
                <div class="mui-input-row">
			        <label>旧密码：</label>
			        <input name="used_password" id="username" type="text" class="mui-input-clear">
			    </div>
                <div class="mui-input-row">
			        <label>新密码：</label>
			        <input name="new_password1" id="username" type="text" class="mui-input-clear">
			    </div>
			    <div class="mui-input-row">
			        <label>确认密码：</label>
			        <input name="new_password2" id="password" type="password">
			    </div>
			 </div>
			 <div  class="mui-button-row">
             <button type="submit" class="btn btn-primary" style="width:100%">保存</button></div>
</form>
<div class="mui-button-row">
<a class="btn btn-danger" style="width:100%" href="out_login.php">退出登录</a></div>