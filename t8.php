<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form action="#" method="post">
请输入数字：
<input type="text" name="text1" />
<input type="submit" name="sub" value="提交" />
</form>
<?php
	//获取到名为text1的文本框值
	$num=$_POST['text1'];
	if(isset($_POST['sub']) and is_numeric($num)){
		echo "你输入的数字是：{$num}";	
	}else{
		echo '输入错误';	
	}
?>
</body>
</html>