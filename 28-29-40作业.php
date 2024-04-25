<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//原字符串：用今日的辛勤工作，换明日的双倍回报！
	//替换后字符串：用今日的辛勤工作，换明日的百倍回报！
	$str = '用今日的辛勤工作，换明日的双倍回报!';
	echo "原字符串为：$str<br>";
	echo "替换字符串后：".str_replace('双倍','百倍',$str)."<hr/>";
	
	//将 web标准网页设计与ASP 中的网页设计标红
	$str = 'web标准网页设计与ASP';
	echo "原字符串为：$str<br>";
	echo "替换字符串后：".str_replace('网页设计','<font style="color:red">网页设计</font>',$str)."<hr/>";
	
	//过滤掉字符串中的非法字符：黄/黑/走私/发票/枪支
	//原字符串：黑色黄色枪支弹药走私物品增值发票
	//新字符串：色色弹药物品增值
	$str = '黑色黄色枪支弹药走私物品增值发票';
	$arr = array('黄','黑','走私','发票','枪支');
	echo "原字符串为：$str<br>";
	foreach ($arr as $value) {
    $str = str_replace($value,'',$str);
	}
	echo "新字符串：".$str;
?>
</body>
</html>