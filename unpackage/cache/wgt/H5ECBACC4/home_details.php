<?php
require_once('connt.php');
$id = $_GET['id'];
$result=$link->query("select* from category,booking where booking.id1 ='{$id}' and category.id =booking.cid ");
$result1=$link->query("select* from category");
session_start();

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
    <a id="icon-menu" class="mui-icon mui-icon-left-nav mui-pull-left" href="home.php"></a>
    <a class="mui-action-back mui-icon  mui-pull-right mui-a-color">详情</a>
    <h1 class="mui-title"></h1>
</header>

<div class="mui-content">
			<div id="slider" class="mui-slider mui-fullscreen">
				<div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
					<div class="mui-scroll">
						<a class="mui-control-item mui-active" href="#item1mobile">
							支出
						</a>
						<a class="mui-control-item" href="#item2mobile">
							收入
						</a>
						
					</div>
				</div>
				<div class="mui-slider-group">
					<div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
						<div id="scroll1" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <form action="out_change.php" method="post">
                            
                                <div class="form-group">
                                    <label>类型</label>
                                    <select name="title">
                                    <?php
                                    foreach ($result as $key => $value) {
  					                        foreach ($value as $k => $v) {
    					                              $arr[$k] = $v;
  					                                      }?>
                                    <?php
                                    $amount=$arr['amount'];
                                    $remark = $arr['remark'];
                                    $title = $arr['title'];
                                    
                                    
                                    ?>
                                    <?php }?>
                                    <option><?php echo $arr['title']?></option>
                                    <?php
                                    
                                    foreach ($result1 as $key => $value) {
  					                        foreach ($value as $k => $v) {
    					                              $arr[$k] = $v;
  					                                      }?>
                                    <?php 
                                    echo "<option>{$arr['title']}</option>";
                                    ?>
                                    <?php }?>
                                    </select>
                                    </div>
                                    <input name="id" type="hidden" value="<?php echo $id; ?>"></input>
                                <div class="form-group">
                                    <label>金额</label>
                                    <input type="text" name="amount" class="form-control" value="<?php echo $amount;?>"></input>
                                </div>
                                <div class="form-group">
                                    <label>备注</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $remark;?>"></input>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">提交</button>
                                </div>   
                            </form>
                            <button type="button" id="dele" class="btn btn-danger btn- form-control">删除</button>
                            </div>
						</div>
					</div>
					<div id="item2mobile" class="mui-slider-item mui-control-content">
						<div id="scroll2" class="mui-scroll-wrapper">
							<div class="mui-scroll">
                            <form action="get_change.php" method="post">
                            
                                    <div class="form-group">
                                    <label>类型</label>
                                    <select name="title">
                                    <?php
                                    
                                    foreach ($result as $key => $value) {
  					                        foreach ($value as $k => $v) {
    					                              $arr[$k] = $v;
  					                                      }?>
                                    <?php 
                            
                                    echo "<option>{$arr['title']}</option>";
                                    ?>
                                    <?php }?>
                                    </select>
                                    </div>
                                    <input name="id" type="hidden" value="<?php echo $id; ?>"></input>
                                <div class="form-group">
                                    <label>金额</label>
                                    <input type="text" name="amount" class="form-control"value="<?php echo $amount?>">
                                </div>
                                <div class="form-group">
                                    <label>备注</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $remark?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">提交</button>
                                </div> 
                                
                            </form>
                            <div class="form-group">
                                    
                                    <a id="dele" class="btn btn-danger btn- form-control">删除</a>
                                </div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
       
	

</body>	<script type="text/javascript">
            var info = document.getElementById("info");
            document.getElementById("dele").addEventListener('tap', function() {
				var btnArray = ['否', '是'];
				mui.confirm('确定删除？','',btnArray, function(e) {
					if (e.index == 1) {
						window.location.href="details_dele.php?id=" + <?php echo $id?>;
					} else {
						
					}
				})
			});
                
            
			// 点击首页回到原点
			document.querySelectorAll('.mui-control-item')[2].addEventListener('tap', function() {
				mui('.mui-scroll-wrapper').scroll().scrollTo(0, 0, 900);
			});
			// 点击游记左滑80px
			document.querySelectorAll('.mui-control-item')[3].addEventListener('tap', function() {
				mui('.mui-scroll-wrapper').scroll().scrollTo(-80, 0, 900);
			});
			
		</script>
</html>