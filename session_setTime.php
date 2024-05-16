<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	date_default_timezone_set("Etc/GMT-8");//设置时区
	session_start();
	$time = 1*40;//给出session实效的时间	40s
	//使用setcookie手动设置session实效时间
	setcookie(session_name(),session_id(),time()+$time,"/");
	//设置session名
	$_SESSION['user']="cm";
	//赋值当前时间
	$expiry=date("H:i:s");
	//如果不为空
	if(!empty($_SESSION)){
		echo "<a href='session_getTime.php?time=$expiry'>SIONNION存在，请点击";
	}else{
		echo "SESSION不存在";
	}
?>
</body>
</html>