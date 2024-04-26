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
	
	//合并
	echo "<hr>";
	$a1 = array("a"=>"red","b"=>"green");
	$a2 = array("c"=>"blue","b"=>"yellow");
	$a3 = array("c"=>"blue","d"=>"yellow");
	$a4 = array("3"=>"blue","5"=>"yellow","7"=>"res","9"=>"green");
	print_r(array_merge($a1,$a2));//有相同的键b，a1的b会被a2的b覆盖
	echo "<br>";
	print_r(array_merge($a1,$a3));//a1和a2合并
	echo "<br>";
	print_r(array_merge($a4));//键会重新排序
	echo "<br>";
	//从数组中取出一段序列
	$b1 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
	$b2 = array("a"=>"purple","b"=>"orange");
	print_r(array_slice($b1,-1));
	echo "<br>";
	//从数组中移除选定的元素，并用新元素替代，返回移除或被替换的元素
	print_r(array_splice($b1,0,2,$b2));
	echo "<br>";
	print_r($b1);
?>
</body>
</html>