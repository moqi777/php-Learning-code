<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	$string='php';
    $num = 10;
    echo $string,$num;
    echo '<br>';
    print $string.'<br>';
	$a=array('a','b','c');
	print_r($a);
	echo '<br>';
	var_dump($a);
	echo '<br>';
	
	$file = fopen("casual.txt","w");
	var_dump($file);
	echo '<br><br>';
	
	//null实例
	echo "变量(\$string1)直接赋值为null:";
	$string1 = null;
	$string3 = "str";
	if(is_null($string1))
		echo "stirng = null";
	echo "<p>变量(\$string2)未被赋值:";
	if(is_null($string2))
		echo "string2=null";
	echo "<p>被unset()函数处理过的变量(\$string3):";
	unset($string3);
	if(is_null($string3))
		echo "string3=null";
	
	echo '<br><br>';
	//is_*检测函数
	var_dump(is_bool('1'));
	var_dump(is_string('1'));
	var_dump(is_float('1.0'));
	var_dump(is_int(1));
	var_dump(is_numeric(1));//is_numeric：检测变量是否为数字或由数字组成的字符串
	echo '<br>';
	$a1=true;
	$a2='php';
	$a3=10;
	var_dump(is_int($a1));
	var_dump(is_int($a2));
	var_dump(is_int($a3));
	
	//强制转	换例2-10
	echo '<br><br>';
	$num = '6.1234196r*r';
	echo '使用(integer)操作符转换变量$num类型:';
	echo (integer)$num;
	echo '<br>';
	echo '输出变量$num的值：'.$num;
	echo '<p>';
	echo '使用settype()函数转换变量$num类型:';
	echo settype($num,'integer');
	echo '<br>';
	echo '输出变量$num的值：',$num;
	echo '<p>';
	
	//隐式转换
	$str1 = 'HelloWorld!';
	$int1 = 666;
	var_dump($str1 = $int1);
	echo '<br>';
	$a = "She is";
	$b = 9;
	var_dump($a.$b);
?>
</body>
</html>