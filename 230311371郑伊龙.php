<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//判断该月天数
	switch(date(n))
	{
		case 4:
		case 6:
		case 9:
		case 11:
			echo "这个月有30天";
			break;
		case 2:
				$year = date(Y);
				if($year%4==0 && $year%100!=0 || $year%400==0)
					echo "这个月有29天";
					else
					echo "这个月有28天";
					break;
		default:
			echo "这个月有31天";
		}
	echo "<p/>";
	
	//求自然数1-10之和
	$a = 1;
	$sum =0;
	while($a<=10){
		if($a%2==0){
			$sum -= $a;
		}else{
			$sum += $a;
		}
		$a++;
	}
	echo "和为$sum<p/>";
	
	//使用do-while循环输出100-200之间不能被3整除的数，并统计总个数
	$sum = 0;
	$num = 100;
	echo "100到200之间不能被3整除的数有：";
	do{
		if($num%3 != 0){
			echo "$num ";
			$sum++;
		}
		$num++;
	}
	while($num<=200);
	echo "<br/>共有$sum 个";
?>
</body>
</html>