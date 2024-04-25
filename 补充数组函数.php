<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//建立一个包含指定范围内的数组
	$arr = range(1,10);
	print_r($arr);
	echo '<br>';
	//将数组最后一个元素弹出（出栈）
	array_pop($arr);
	print_r($arr);
	echo '<br>';
	//将一个或多个元素压入至数组的末尾（入栈）
	array_push($arr);
	print_r($arr);
	echo '<hr>';
	
	//复习
	$a = range(1,10);
	print_r($a);
	echo '<hr>';
	//删除末尾一个元素
	$foot =  array_pop($a);
	print_r($a);
	echo '<hr>';
	//在末尾增加元素
	array_push($a,$foot,20,30,40);
	print_r($a);
	echo '<hr>';
	//删除开头一个元素
	$head = array_shift($a);
	echo $head.'<br>';
	print_r($a);
	echo '<hr>';
	//在开头增加元素
	array_unshift($a,$head,50,60,70);
	print_r($a);
?>
</body>
</html>