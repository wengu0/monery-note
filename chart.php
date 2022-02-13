<?php
//调用文件连接数据库
require_once('connt.php');
//获取各个时间段
$today =date("Y-m-d");
$week_day1 =date("Y-m-d ",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")));
$week_day2 =date("Y-m-d ",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y")));
$month_day1=date("Y-m-d ",mktime(0, 0 , 0,date("m"),1,date("Y")));
$month_day2=date("Y-m-d",mktime(23,59,59,date("m"),date("t"),date("Y")));
$year_day1 =date('Y-01-01');
$year_day2 =date('Y-12-31');

session_start();
//获取用户id
$res = $link->query("select* from user where username ='{$_SESSION["username"]}'");
foreach ($res as $key => $value) {
	foreach ($value as $k => $v) {
			$arr[$k] = $v;
			
				  }
			$id = $arr['id'];
                }
//获取各个时间段的数据
$result1=$link->query("select title,sum(amount),type from booking,category where booking.cid=category.id and type='-1' and aid like'{$id}' group by title ");
$result2=$link->query("select title,sum(amount),type from booking,category where booking.cid=category.id and type='1' and aid like'{$id}' group by title");
$result3=$link->query("select title,sum(amount),type from booking,category where postdate like '{$today}' and booking.cid=category.id and type='-1' and aid like'{$id}' group by title");
$result4=$link->query("select title,sum(amount),type from booking,category where postdate like '{$today}' and booking.cid=category.id and type='1' and aid like'{$id}' group by title");
$result5=$link->query("select title,sum(amount),type from booking,category where postdate between '{$week_day1}'and'{$week_day2}' and booking.cid=category.id and type='-1' and aid like'{$id}' group by title");
$result6=$link->query("select title,sum(amount),type from booking,category where postdate between '{$week_day1}'and'{$week_day2}' and booking.cid=category.id and type='1' and aid like'{$id}' group by title");
$result7=$link->query("select title,sum(amount),type from booking,category where postdate between '{$month_day1}'and'{$month_day2}' and booking.cid=category.id and type='-1' and aid like'{$id}' group by title");
$result8=$link->query("select title,sum(amount),type from booking,category where postdate between '{$month_day1}'and'{$month_day2}' and booking.cid=category.id and type='1' and aid like'{$id}' group by title");
$result9=$link->query("select title,sum(amount),type from booking,category where postdate between '{$year_day1}'and'{$year_day2}' and booking.cid=category.id and type='-1' and aid like'{$id}' group by title");
$result10=$link->query("select title,sum(amount),type from booking,category where postdate between '{$year_day1}'and'{$year_day2}' and booking.cid=category.id and type='1' and aid like'{$id}' group by title");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/echarts.min.js"></script>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="utf-8"> </script>
    <link rel="stylesheet" href="bootstrap/css/spacelab.min.css">
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
   
</head>
<body>
<header class="mui-bar mui-bar-nav mui-bar-nav-bg">
    <a id="icon-menu" class="mui-icon mui-icon-left-nav mui-pull-left" href="index.php"></a>
    <a class="mui-action-back mui-icon  mui-pull-right mui-a-color">图表统计</a>
    <h1 class="mui-title"></h1>
</header>
    <div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll">
						<a class="mui-control-item mui-active" href="#item1mobile">
							今天
						</a>
						<a class="mui-control-item" href="#item2mobile">
							本周
						</a>
						<a class="mui-control-item" href="#item3mobile">
							本月
						</a>
                        <a class="mui-control-item" href="#item4mobile">
							本年
						</a>
                        <a class="mui-control-item" href="#item5mobile">
							所有
						</a>
					</div>
				</div>
				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <div>支出<div id="out" style="width: 400px;height:350px;"></div></div>
                            <div>收入<div id="get" style="width: 400px;height:350px;"></div></div>
							</div>
						</div>
					</div>
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <div>支出<div id="out1" style="width: 400px;height:350px;"></div></div>
                            <div>收入<div id="get1" style="width: 400px;height:350px;"></div></div>
							</div>
						</div>
					</div>
					<div id="item3mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <div>支出<div id="out2" style="width: 400px;height:350px;"></div></div>
                            <div>收入<div id="get2" style="width: 400px;height:350px;"></div></div>
							</div>
						</div>
					</div>
                    <div id="item4mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <div>支出<div id="out3" style="width: 400px;height:350px;"></div></div>
                            <div>收入<div id="get3" style="width: 400px;height:350px;"></div></div>
							</div>
						</div>
					</div>
                    <div id="item5mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <div>支出<div id="out4" style="width: 400px;height:350px;"></div></div>
                            <div>收入<div id="get4" style="width: 400px;height:350px;"></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
       
		<script type="text/javascript">
			// 基于准备好的dom，初始化echarts实例
			var myChart = echarts.init(document.getElementById('out'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        //遍历所有数据存入data数据
                        <?php foreach ($result3 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v; }
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?> 
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                        
                            var myChart = echarts.init(document.getElementById('get'));
                            var option;
                            option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result4 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
            var myChart = echarts.init(document.getElementById('out1'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result5 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('get1'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result6 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>  
                       
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('out2'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result7 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>   
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('get2'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result8 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>  
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('out3'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result9 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>  
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('get3'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result10 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>  
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('out4'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result1 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?> 
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
                            var myChart = echarts.init(document.getElementById('get4'));
			var option;
			option = {
                series: [
                    {
                    type: 'pie',
                    data: [
                        <?php foreach ($result2 as $key => $value) {
                                   foreach ($value as $k => $v) {
                                          $arr[$k] = $v;
           
                                                      }
                        
                        echo " {value:{$arr['sum(amount)']},";
                        echo "name: '{$arr['title']}{$arr['sum(amount)']}'},";
                        
                                    }?>  
                       
                    ],
                    radius: '50%'
                    }
                ]
                };

                            myChart.setOption(option);
		</script>
	</body>

</html>
