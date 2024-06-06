<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>向数据库添加公告信息</title>
</head>

<body>
<?php
//获取表单信息
$title=$_POST['title'];
$content=$_POST['content'];
$createtime=time();
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
	$sql = mysqli_query($con,"insert into tb_notice(title,content,time) values('$title','$content','$createtime')");
	
	if($sql){
		echo "<script>alert('公告信息添加成功!');window.location.href='add_notice.php';</script>";	
	}else{
		echo "<script>alert('公告信息添加失败!');window.location.href='add_notice.php';</script>";	
	}
	//(6)关闭结果集
	mysqli_free_result($sql);
	//(7)关闭服务器
	mysqli_close($con);
?>
</body>
</html>