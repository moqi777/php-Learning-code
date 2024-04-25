<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?php
	//对函数的引用
	function &fun($temp_str=0){
		return $temp_str;	
	}
	$str = &fun("函数引用");
	echo $str."br";
	echo "<hr/>";
	
	//递归函数
	function read($n){
		echo "$n &nbsp;";
		
		if($n>0){
			read($n - 1);	
		}	
	}
	read(6);
	
	echo "<hr/>";
	//设置为亚洲/上海时区，默认是0时区
	date_default_timezone_set("Asia/shanghai");
	echo date("Y 年 m 月 d 日 H:i:s");
	
	echo "<hr/>";
	echo max(10,20,30);
	echo "<br/>";
	echo min(10,20,30);
	echo "<br/>";
	
?>
<body>
</body>
</html>