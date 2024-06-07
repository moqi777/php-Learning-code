<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改公告处理页</title>
</head>

<body>
<?php
//（1）配置信息
$local="localhost";//主机名
$port = "82";//端口号
$user="root";
$password="kaipule452b.";
$chanrset="utf8";//编码
$dbname="db_blog";//数据库名
//(2)连接服务器
$con = mysqli_connect($local,$user,$password);
//var_dump($con);
if(!$con){
	echo '链接服务器失败'.mysqli_connect_error();
	die();
    }
//（3）选择数据库
$selectdb = mysqli_select_db($con,$dbname);
//var_dump($selectdb);
if(!$selectdb){
	echo '链接服务器失败';
	die();
	}
	//(4)设置编码
	mysqli_set_charset($con,$chanrset);
	//(5)执行SQl
	$sql = "select title,content from ads";
	$result = mysqli_query($con,$sql);
	//var_dump($result);
	//取出结果
	
	while($arr=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		printf("%s:%s",$arr['title'],$arr['content']);
		echo '<br>';
	}
	
	/*
	while($obj=mysqli_fetch_row($result)){
		printf("%s:%s",$obj[0],$obj[1]);
		echo '<br>';
	}*/
	echo '<hr>';
	$num=mysqli_num_rows($result);
	echo '共有'.$num.'条记录';
	
	//(6)关闭结果集
	mysqli_free_result($result);
	//(7)关闭服务器
	mysqli_close($con);
	?>
</body>
</html>