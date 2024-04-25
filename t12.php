<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//数组排序函数的使用
	$arr=array('A'=>'php','C'=>'jsp','B'=>'asp');
	$arr1 = array(1,50,20,15);
	foreach($arr1 as $v){
		echo $v.'&nbsp;';
	}
	
	echo '<br>';
	var_dump(sort($arr1,SORT_STRING));
	echo '<br>';
	
	foreach($arr1 as $v){
		echo $v.'&nbsp;'; 
	}
	echo '<br>';
	
	foreach($arr as $v){
		echo $v.'&nbsp;';
	}
	echo '<br>';
	//根据值升序拍，arsort()降序
	asort($arr);
	foreach($arr as $v){
		echo $v.'&nbsp;';
	}
	echo '<br>';
	ksort($arr);
	foreach($arr as $key => $v){
		echo $key.'->'.$v.'&nbsp;';
	}
	echo '<hr>';
	//数组的查找
	//值是否存在
	var_dump(in_array('php',$arr));
	//键是否存在
	var_dump(array_key_exists('e',$arr));
	//根据值找键
	echo array_search('php',$arr);
?>
</body>
</html>