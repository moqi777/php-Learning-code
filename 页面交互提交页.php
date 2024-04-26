<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "姓名：".$_POST['sname']."<br>";
		echo "邮编：".$_POST['postcode']."<br>";
		echo "手机号码：".$_POST['phone']."<br>";
		echo "性别：".$_POST['gender']."<br>";
		$hobby = $_POST['hobby'];
		echo '爱好：';
		foreach($hobby as $v){
			echo $v.'&nbsp;';	
		}
		echo '<br>';
		echo "住址：".$_POST['address'].'<br>';
		echo "自我介绍：".$_POST['text'].'<br>';
	}
?>
</body>
</html>