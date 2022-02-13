## 简单概述
这是一个以PHP,MYSQL代码,基于bootstrp,mui框架,HBuilder打包的‘随手记’app

## 核心功能
1. 启动App后校验登录，显示登录页面，下次登录app直接打开home页面
2. 支持添加收入和支出
3. 支持查看具体的，今天，本周，本月的收支状况  基于日期选择器daterangepicker
4. 支持查看具体的收支图表  基于echarts
5. 支持退出登录，和修改密码

## 文件功能
1. login.php 登录页面
2. test.php 登录数据处理
3. home.php 登录成功的首个页面
4. index.php 首页
5. newbooking.php 添加收支页面
6. out.php 支出数据处理
7. get.php 收入数据处理
8. details.php 详情页面
9. get_change.php 收入数据修改处理
10. out_change.php 支出数据修改处理
11. details.php 数据删除处理
12. new_index.php 跳转日期数据
13. chart.php 图例页面


## 数据库
1. suers 数据库名
2. user 用户表
3. booking 收支记录
4. category 类型记录