<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style>
th{
	background-color:#00F;
	color:#FFF;
}
td{
	background-color:#0FF;
	}
</style>
<body>
<table border="0px" width="800px" height="200px" cellspacing="0px" cellpadding="20px">
<form method="post" action="页面交互提交页.php" enctype="multipart/form-data">
	<tr><th>个人信息</th></tr>
    <tr><td>姓名：<input type="text" id="name" name="sname"/></td></tr>
    <tr><td>邮编：<input type="text" id="postcode" name="postcode"/></td></tr>
    <tr><td>手机号码：<input type="text" id="phone" name="phone"/></td></tr>
    <tr><td>性别：<input type="radio" id="gender1" name="gender" value="男"/><label>男</label>&nbsp;<input type="radio" id="gender2" name="gender" value="女"/><label>女</label></td></tr>
    <tr><td>爱好：<input type="checkbox" id="hobby1" name="hobby[]" value="游泳"/><label>游泳</label>&nbsp;<input type="checkbox" id="hobby2" name="hobby[]" value="读书"/><label>读书</label>&nbsp;<input type="checkbox" id="hobby3" name="hobby[]" value="跑步"/><label>跑步</label></td></tr>
    <tr><td>住址：<select id="address" name="address" size="1">
    	<option>上海</option>
        <option>北京</option>
        <option>广州</option>
        <option>深证</option>
    </select></td></tr>
    <tr><td>上传头像：<input type="file" id="img" name="img"/></td></tr>
    <tr><td>自我介绍：<textarea name="text" cols="25px" rows="7px"></textarea></td></tr>
    <tr><td><input type="submit" value="提交"/>&nbsp;&nbsp;<input type="reset"/></td></tr>
</form>
</table>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		echo "姓名：",$_POST['sname']."<br>";
		echo "邮编：",$_POST['postcode']."<br>";
		echo "手机号码：",$_POST['phone']."<br>";
		echo "性别：",$_POST['gender']."<br>";
		$hobby = $_POST['hobby'];
		foreach($hobby as $v){
			echo $v;	
		}
	}
?>
</body>
</html>