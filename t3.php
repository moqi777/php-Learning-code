<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>
body{
	//background-color:<?php echo 'red';?>
	}
</style>
<script>
//alert(<?php echo 10+20;?>);
</script>
</head>
<body>
<?php
	//变量的作用域
	$x=10;
	function test(){
		global $x;
		$x=50;
		echo "在函数内输出的内容是：$x.<br/>";	
	}
	test();
	echo "在函数外输出的内容是：$x.<br/>";
	echo "<p/>";
	
	//书本 例2-16
	function sum(){
		static $a=0;
		$a++;
		echo $a.' ';
		}
	function num(){
		$a=0;
		$a++;
		echo $a.' ';
		}
	for($i=0;$i<10;$i++){
		sum();
		}
		echo "<br/>";
	for($i=0;$i<10;$i++){
		num();
		}
	echo "<p>";
		
	//可变变量
	$change_name = "casual";
	$casual = "l like to sing";
	echo $change_name;
	echo "<br>";
	echo $$change_name;
	echo "<p>";
	
	/*
	常量定义
	(第一个变量：常量名
	第二个常量：变量值
	第三个变量：常量名是否大小写敏感，true表示不区分大小写，不写默认false)
	*/
	var_dump(define("PI","3.1415926",true));
	echo pi;
	echo "<p>";
	
	//运算符
	$a=45;
	$b=63;
	$c=36;
	echo ($a>$b)?($a>$c)?$a:$c:($b>$c)?$b:$c;
?>
</body>
</html>