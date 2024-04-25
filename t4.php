<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	$n = rand();
	if($n%2 == 0){
			echo "\$n = $n";
			echo "<br>$n 是偶数。";
		}else{
			echo "<br>$n 是奇数。";
		}
		
	echo "<p/>";
	$year = 2024;
	if($year%4==0 && $year%100!=0 || $year%400==0)
		echo "$year 是闰年";
		else
		echo "$year 不是闰年";	
		
	echo "<p/>";	
	$a = 2;
	$b = 3;
	$c = 6;
	if($a+$b>$c && $a+$c>$b && $b+$c>$a){
			echo "能构成三角形<br/>";
			if($a==$b && $b==$c){
				echo "是等边三角形";
				}elseif($a==$b || $a==$c || $b==$c){
					echo "是等腰三角形";
					}else{
						echo "是普通三角形";
						}
		}else{
			echo "不能构成三角形"; 
			}
			
	/* switch */

?>
</body>
</html>