<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加公告</title>
</head>

<body>
<input type="button" value="返回主页面" onclick="window.location.href='main.html'"/>
<form name="form1" method="post" action="doAction.php">
	<table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    	<tr>
        	<td width="87" align="center">公告主题：</td>
            <td width="433" height="31"><input name="title" type="text" id="txt_title" size="40"/>*</td>
        </tr>
        <tr>
        	<td width="124" align="center">公告内容：</td>
            <td><textarea name="content" cols="50" rows="8" id="txt_content"></textarea></td>
        </tr>
        <tr>
        	<td height="40" colspan="2" align="center">
            	<input name="Submit" type="submit" class="btn_grey" value="提交" onclick="return check(form1);"/>
                &nbsp;<input type="reset" name="Submit2" value="重置"/>
            </td>
        </tr>
    </table>
</form>
</body>
<script>
function check(form){
	if(form.txt_title.value==""){
		alert("请输入公告标题！");	
		form.txt_title.focus();
		return false;
	}
	if(form.txt_content.value==""){
		alert("请输入公告内容！");	
		form.txt_content.focus();
		return false;
	}
	form.submit();
}
</script>
</html>