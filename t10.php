<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//查找字符串
	$mail='ncgxy0163@163.com';
	if(strstr($mail,'@')!=false && strstr($mail,'.')!=false && strpos($mail,'@')<strpos($mail,'.') && substr($mail,-3)=='com')
	echo '输入正确';
	else
	echo '输入错误';
echo '<hr/>';
	
	//替换字符串
	$str = "BJJQE http://www.bjjqe.com/";
	echo "原字符串为：$str<br>";
	echo "替换字符串后：".str_replace('BJJQE','北京金企鹅',$str)."<br/>";
	echo "替换字符串后：".str_ireplace('BJJQE','北京金企鹅',$str)."<hr/>";
	
	//从右向左每三位隔开
	$str = "abcdef";
	$s1 = strrev($str);
	for($i=0;$i<strlen($s1);$i++){
		$string .= substr($s1,$i,1);
		if($i%3==2){
			$string .= ",";	
		}	
	}
	echo trim(strrev($string),",");
	
?>
</body>
</html>