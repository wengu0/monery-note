<?php
//调用文件连接数据库
require_once('connt.php');

session_start();
$res = $link->query("select* from user where username ='{$_SESSION["username"]}'");
foreach ($res as $key => $value) {
	foreach ($value as $k => $v) {
			$arr[$k] = $v;
			
				  }
			$id = $arr['id'];
                }
$result=$link->query("select* from booking,category where category.id =booking.cid and aid like'{$id}'");
$result1=$link->query("select* from booking where type like '1' and aid like'{$id}'");
$result2=$link->query("select* from booking where type like '-1' and aid like'{$id}'");
$sum_get =0;
foreach ($result1 as $key => $value) {
    foreach ($value as $k => $v) {
            $arr[$k] = $v;
            
                  }
            $sum_get+=$arr['amount'];
            
}
$sum_out =0;
foreach ($result2 as $key => $value) {
    foreach ($value as $k => $v) {
            $arr[$k] = $v;
            
                  }
            $sum_out+=$arr['amount'];}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />  
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    <link rel="stylesheet" href="bootstrap/css/spacelab.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css"/>
   <style>
       .p{
           color: #ccc;
           font-size: small;
       }
       .z{
           color:blue;
       }
   </style>
     

   <?php 
   if (isset($_COOKIE['username'])) {
    # 若记住了用户信息,则直接传给Session
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
    }
    if (!isset($_SESSION['islogin'])) {
      echo"<script>
      mui.alert('你还没登录',function () {
        window.location.href='login.php'});</script>";  
    } ?>
</head>
<body>
<header class="mui-bar mui-bar-nav mui-bar-nav-bg">
    <a id="icon-menu" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <button type="button" class="btn btn-primary mui-pull-right" data-toggle="modal" data-target="#myModal">
    日期
</button>
    
</script>
    <h1 class="mui-title"></h1>
    
</header>
<div style="background:url('bc.png') no-repeat;width:100%;height:170px">
<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "&nbsp<p>收入".$sum_get."&nbsp&nbsp|支出".$sum_out."</p>"
?>
</div>
<ul class="mui-table-view">
<?php
//遍历数据库输出明细
        foreach ($result as $key => $value) {
  					foreach ($value as $k => $v) {
    					     $arr[$k] = $v;
  					         }?>
                    <?php
                    $money = $arr['amount']*$arr['type'];
                    echo "<li class='mui-table-view-cell'><a class='mui-navigate-right' href='details.php?id={$arr['id1']}'><div style='float:left' class='z'>{$money}</div><div style='float:right;margin-right:150px;'>{$arr['title']}</div></div><br><div class='p'>{$arr['postdate']}</div></a></li>";
                    ?>
                    <?php }?>
	    
	</ul>
    
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">修改日期</h4>
            </div>
            <div class="modal-body">
        <form action="new_index.php"method="post">
                    <label>开始</label>
                    <input type="text" name="data1" class="form-control" value="2021-10-30">
                    <label>结束</label>
                    <input type="text" name="data2" class="form-control" value="2021-12-30">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </form>
        </div>
    </div>
</div>
        
		<script src="js/mui.min.js"></script>
		<script src="js/mui.picker.min.js"></script>
		<script type="text/javascript">
        var beginTimeTake;
            //选择input name属性添加日期选择器
            $('input[name="data2"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
            //设置日期格式
                "locale": {
                    format: 'YYYY-MM-DD',
                    
                }
            }, 
            //开始结束日期设置
            function(start, end, label) {
                beginTimeTake = start;
                if(!this.startDate){
                    this.element.val('');
                }else{
                    this.element.val(this.startDate.format(this.locale.format));
                }
            });
            var beginTimeTake;
            
            $('input[name="data1"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
               
                "locale": {
                    format: 'YYYY-MM-DD',
                    
                }
            }, 
            function(start, end, label) {
                beginTimeTake = start;
                if(!this.startDate){
                    this.element.val('');
                }else{
                    this.element.val(this.startDate.format(this.locale.format));
                }
            });
            

        </script>
    <nav class="mui-bar mui-bar-tab">

		<a class="mui-tab-item" style="touch-action:none;" href="newbooking.php">
			<span class="mui-icon">
				 <svg t="1635214768801" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4168"
				  width="23" height="23">
				  <path d="M512 512m-448 0a448 448 0 1 0 896 0 448 448 0 1 0-896 0Z" fill="#efb336" p-id="4169"></path><path d="M256 256m64 0l384 0q64 0 64 64l0 384q0 64-64 64l-384 0q-64 0-64-64l0-384q0-64 64-64Z" fill="#FFDF79" p-id="4170"></path><path d="M320 256h80v512h-80c-35.346 0-64-28.654-64-64V320c0-35.346 28.654-64 64-64z" fill="#FFF1BE" p-id="4171"></path><path d="M446 698c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z m-92 0c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z m92-158c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z m-92 0c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z m92-158c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z m-92 0c-15.464 0-28-12.536-28-28s12.536-28 28-28 28 12.536 28 28-12.536 28-28 28z" fill="#ECC77C" p-id="4172"></path><path d="M354 652h92c9.941 0 18 8.059 18 18s-8.059 18-18 18h-92c-9.941 0-18-8.059-18-18s8.059-18 18-18z m0-158h92c9.941 0 18 8.059 18 18s-8.059 18-18 18h-92c-9.941 0-18-8.059-18-18s8.059-18 18-18z m0-158h92c9.941 0 18 8.059 18 18s-8.059 18-18 18h-92c-9.941 0-18-8.059-18-18s8.059-18 18-18z"
				  fill="#FFFFFF" p-id="4173"></path></svg>
			</span>
			<span class="mui-tab-label">记一笔</span>
		</a>
		<a id="display" class="mui-tab-item " style="touch-action: none;" href="index.php">
			<span class="mui-icon">
				<svg t="1635214085704" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1204"
				 width="23" height="23">
				 <path d="M512.546 86.050c0 0-12.561-0.546-24.030 7.1-12.015 8.192-462.029 380.109-462.029 380.109s-32.768 25.668 2.731 70.997 74.82 3.823 74.82 3.823l407.962-359.356 414.515 364.817c0 0 36.591 30.583 70.451-11.469 33.86-42.598-3.277-72.090-3.277-72.090l-121.242-99.942v-175.309h-164.932v39.868l-168.209-139.81c0 0-10.923-9.83-26.761-8.738z" p-id="1205" fill="#efb336"></path><path d="M512.546 241.152l-410.146 357.171v300.919l333.141 0.546v-246.306l152.917 1.638v244.122l333.141 0.546v-300.919z" p-id="1206"
				  fill="#efb336"></path></svg>
			</span>
			<span class="mui-tab-label">首页</span>
		</a>
		<a class="mui-tab-item" style="touch-action: none;" href="chart.php">
			<span class="mui-icon">
				<svg t="1635214335251" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2089"
				 width="23" height="23">
				<path d="M488.448 130.432l-0.085333 4.352a42.666667 42.666667 0 0 1-39.125334 41.472c-5.205333 0.426667-9.002667 0.853333-11.434666 1.28a374.144 374.144 0 0 0-175.658667 79.829333C200.874667 307.626667 161.152 372.053333 142.165333 449.024c-20.266667 83.072-11.648 163.498667 25.472 240.085333 48.341333 99.498667 126.848 165.674667 233.856 191.658667 131.626667 32 248.149333-1.28 343.893334-97.792 54.144-54.613333 85.333333-119.765333 96.64-193.536 0.512-3.498667 1.066667-7.978667 1.664-13.44a42.666667 42.666667 0 0 1 42.410666-38.314667h4.522667a42.112 42.112 0 0 1 41.984 45.653334 216.106667 216.106667 0 0 1-1.024 9.642666 427.349333 427.349333 0 0 1-16.170667 72.32c-28.885333 93.44-82.389333 169.6-160.938666 228.010667-162.688 121.130667-375.850667 111.573333-522.965334 6.058667C54.997333 773.034667 4.096 554.581333 70.954667 376.32a445.610667 445.610667 0 0 1 373.589333-287.402667 40.576 40.576 0 0 1 43.946667 41.472z m476.586667 340.48l-368.554667 0.426667a42.666667 42.666667 0 0 1-42.666667-42.666667v-363.093333A22.954667 22.954667 0 0 1 577.706667 42.666667c214.229333 8.661333 400.042667 205.226667 403.626666 411.733333a16.256 16.256 0 0 1-16.256 16.512z m-326.229334-333.226667v246.058667h245.845334c-41.045333-123.477333-121.898667-204.928-245.845334-246.058667z" p-id="2090"
				 fill="#efb336"></path></svg>
			</span>
			<span class="mui-tab-label">图表</span>
		</a>
		<a id="home" class="mui-tab-item " style="touch-action: none;" href="account.php">
			<span class="mui-icon">
			<svg t="1611805295905" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="47483"
			 width="23"height="23">
			 <path d="M511.791672 1024C794.284009 1024 1023.861115 794.284009 1023.861115 512.069443c0-282.353452-229.715991-511.930557-511.930558-511.930558-282.214567-0.138885-511.930557 229.577106-511.930557 511.930558 0 282.214567 229.577106 511.930557 511.791672 511.930557" fill="#efb336" p-id="47484" data-spm-anchor-id="a313x.7781069.0.i74" class="selected"></path><path d="M767.201411 707.064153c-7.916452 0-14.444053-6.527601-14.444053-14.444053s6.527601-14.444053 14.444053-14.444052c6.527601 0 10.138614-3.888783 11.66635-6.110946 2.916588-4.027669 3.472128-9.166418 1.805506-13.888512-19.443917-54.304082-63.748271-97.497355-118.607893-115.413536-7.638682-2.499932-11.66635-10.555269-9.305303-18.193951s10.555269-11.66635 18.19395-9.305303c31.249152 10.277499 60.137258 27.777024 83.747729 50.831955 23.610471 22.916045 41.943307 51.52638 52.915231 82.358877 4.860979 13.610742 2.777702 28.610335-5.41652 40.276685-7.916452 11.527465-20.693883 18.332836-34.99905 18.332836z" fill="#FFFFFF" p-id="47485"></path><path d="M657.759935 545.124101c-5.138749 0-9.999729-2.638817-12.638546-7.499796-3.888783-6.944256-1.249966-15.694019 5.69429-19.582802 35.554591-19.582802 57.637325-56.9429 57.637325-97.497355 0-54.026312-38.471179-99.997287-91.525295-109.441476-7.916452-1.388851-13.055201-8.888648-11.66635-16.8051s8.888648-13.055201 16.8051-11.66635c31.943578 5.69429 61.248339 22.49939 82.219992 47.359826 21.388309 25.138207 33.193544 57.359555 33.193544 90.414214 0 50.97084-27.777024 98.052896-72.498034 122.635563-2.499932 1.388851-4.860979 2.083277-7.222026 2.083276z m-16.666215 197.911298c-7.916452 0-14.444053-6.527601-14.444052-14.444052s6.527601-14.444053 14.444052-14.444053c6.527601 0 12.360776-3.055473 16.110674-8.333107 3.888783-5.555405 4.860979-12.499661 2.499933-19.027262-23.3327-65.137122-76.525702-116.802387-142.218365-138.468466-7.638682-2.499932-11.66635-10.555269-9.305303-18.193951 2.499932-7.638682 10.555269-11.66635 18.193951-9.305303 36.526787 11.94412 70.553642 32.638004 98.330666 59.581717s49.165333 60.276143 62.081649 96.52516c5.41652 15.277363 3.194358 32.221348-6.110945 45.276549-9.027533 13.332972-23.471586 20.832768-39.58226 20.832768z m-402.627967 0c-15.971789 0-30.415842-7.499797-39.721144-20.554998-9.305303-13.194087-11.527465-30.138071-6.110946-45.276549 13.055201-36.249017 34.44351-69.581446 62.08165-96.525159 27.777024-26.943714 61.664994-47.498712 98.330666-59.581718 7.638682-2.499932 15.694019 1.666621 18.19395 9.305304 2.499932 7.638682-1.666621 15.694019-9.305303 18.19395-65.692662 21.527194-118.885664 73.331344-142.218364 138.468467-2.361047 6.527601-1.388851 13.471857 2.499932 19.027261 3.749898 5.277635 9.583073 8.333107 16.110674 8.333107 7.916452 0 14.444053 6.527601 14.444053 14.444053 0 7.499797-6.24983 14.166282-14.305168 14.166282z" fill="#FFFFFF" p-id="47486"></path><path d="M439.849179 569.428998c-43.609928 0-84.581039-16.943985-115.413535-47.776482C293.603147 490.820019 276.659162 449.848908 276.659162 406.23898s16.943985-84.581039 47.776482-115.413536c30.832497-30.832497 71.803608-47.776482 115.413535-47.776482s84.581039 16.943985 115.413536 47.776482c30.832497 30.693612 47.776482 71.664723 47.776482 115.274651S586.095212 490.681134 555.262715 521.513631c-30.832497 30.832497-71.803608 47.915367-115.413536 47.915367z m0-297.630815c-74.02577 0-134.440798 60.276143-134.440797 134.440797S365.684525 540.679778 439.849179 540.679778c74.02577 0 134.440798-60.276143 134.440798-134.440798s-60.415028-134.440798-134.440798-134.440797z"
			  fill="#FFFFFF" p-id="47487"></path></svg>
			</span>
			<span class="mui-tab-label">我的</span>
		</a>
	</nav>
</body>
<script>
	//点击导航栏切换
	 mui('body').on('tap','a',function(){
		  document.location.href = this.href;
	  })
</script>
</body>
</html>