<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//设置时间区
	date_default_timezone_set("Asia/shanghai");
	$NowTime = date("y-m-d H:i:s",time());
	if(!isset($_COOKIE)){
		echo "欢迎您访问网站！您是初次光临本网站喔<br>您本次访问网站的时间为：".$NowTime;
	}else{
		echo "您上次访问网站的时间为：".$_COOKIE["time"]."<br>您本次访问网站的时间为：".$NowTime;
	}
	setcookie("time",$NowTime);
?>
</body>
</html>