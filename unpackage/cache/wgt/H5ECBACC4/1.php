<?php
header('Content-type:text/html; Charset=utf8'); 
header( "Access-Control-Allow-Origin:*"); 
header('Access-Control-Allow-Methods:POST');   
header('Access-Control-Allow-Headers:x-requested-with,content-type');
$username=$_POST['username'];
$password=$_POST['password'];
$con = mysqli_connect('localhost','root','','users');//链接数据库
//mysql_set_charset($link,'utf8'); //设定字符集
 

 
$sql_select="select username,password from user where username= ?"; //从数据库查询信息
$stmt=mysqli_prepare($con,$sql_select);
 mysqli_stmt_bind_param($stmt,'s',$username);
 mysqli_stmt_execute($stmt);
 $result=mysqli_stmt_get_result($stmt);
 $row=mysqli_fetch_assoc($result);
    if($row){ 
        if($row['password']==$password){  
                echo 1;//普通用户  
        }else{ 
            echo 3;//密码错误 
        } 
    }else{ 
        echo 4;//用户不存在 
    } 
 
 ?>