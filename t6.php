<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<?php
	//输出一个数的4次方
	function fun1($num){
		//is_int() 判断是否非一个整数
		if(is_int($num)){
			//pow(第一个参数的第二个参数次方) 
			return pow($num,4);
		}else{
			return '不是一个整数';	
		}
	}
	echo fun1(2);
?>
<hr/>
<?php
	//讲一个数逆序输出
	function fun2($snum){
		for($i=1;$snum>1;$i++){
			$arr[$i]=$snum%10;
			$snum=$snum/10;	
		}
		return $arr;
	}
	//print_r() 输出一个数组
	print_r(fun2(321123).'<br/>');
	//使用foreach输出数组
	foreach(fun2(789) as $value){
		echo $value.'<br/>';
	}
?>
<body>
</body>
</html>