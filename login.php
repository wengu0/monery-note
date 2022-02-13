<?php
require_once('connt.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8">
      	mui.init();
    </script>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
			
			<h1 class="mui-title">欢迎登录</h1>
		</header>
		<div class="mui-content">
			<form action="test.php" method="post">
			<div id="input_example" class="mui-input-group" style="margin-top: 30px;">
			    <div class="mui-input-row">
			        <label>用户名：</label>
			        <input name="username" id="username" type="text" class="mui-input-clear" placeholder="请输入用户名">
			    </div>
			    <div class="mui-input-row">
			        <label>密码：</label>
			        <input name="password" id="password" type="password" class="mui-input-clear0" placeholder="请输入密码">
			    </div>
			 </div>
			<div class="mui-button-row" style="margin-top:30px">
			        <button type="submit" data-loading-text="登录中" class="mui-btn mui-btn-primary" style="width:80%;height: 40px;">登录</button>
			        
			
		</div></form></div>
	<script>
		
	</script>
		
</body>
</html>