<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	session_start();
	//unset($_SESSION['user']);
	//unset($_SESSION['password']);
	
	//删除全部session需要以下两行配合在一起使用
	//第一行只是删除文件里面的内容，文件还在
	//第二行只是删除文件，但是内容还在硬盘中后续仍能读取到session
	$_SEESION=array();
	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['password']);
?>
</body>
</html>