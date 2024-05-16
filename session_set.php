<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//创建的session文件可以在C:\Users\86134\AppData\Local\Temp下按照时间顺序排序第一个新的就是
	session_start();
	$_SESSION['user']='admin';
	$_SESSION['password']='1234';
?>
</body>
</html>