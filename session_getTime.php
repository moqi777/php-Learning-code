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
	echo "传送页面时间:".$_GET[time]."<br>";
	echo date("H:i:s");
	echo "<p>";
	echo $_SESSION['user']."<p>";
?>
</body>
</html>