<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//上机练习
	$arr = array('a'=>'word','c'=>'excel','b'=>'ppt');
	//循环遍历整个键数组和值
	foreach($arr as $key=>$v){
		echo $key.'=>'.$v.'<br>';
	}
	echo '<hr>';
	//保持原有的键值对关系，按值升序
	asort($arr);
	foreach($arr as $key=>$v){
		echo $key.'=>'.$v.'<br>';
	}
	echo '<hr>';
	//保持原有的键值对关系，按值降序
	arsort($arr);
	foreach($arr as $key=>$v){
		echo $key.'=>'.$v.'<br>';
	}
	echo '<hr>';
	//按键升序
	ksort($arr);
	foreach($arr as $key=>$v){
		echo $key.'=>'.$v.'<br>';
	}
	echo '<hr>';
	//统计数组元素的个数
	echo count($arr,1);
	echo '<hr>';
	
	//上机练习
	$arr = array(5,8,2,3,7,6,9,1,8,4,3,0);
	$maxNumb = array_search(max($arr),$arr);
	$minNumb = array_search(min($arr),$arr);
	echo '最大值的索引是'.$maxNumb.'<br>';
	echo '最小值的索引是'.$minNumb.'<br>';
	unset($arr[$maxNumb]);
	unset($arr[$minNumb]);
	$sum = array_sum($arr);
	$count = count($arr);
	echo '平均值为：'.($sum/$count);
	
?>
</body>
</html>