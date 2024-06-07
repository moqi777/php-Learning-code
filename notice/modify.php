<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改公告操作页</title>
</head>

<body>
<?php
$id=$_GET['id'];
//（1）配置信息
$local="localhost";//主机名
$port = "82";//端口号
$user="root";
$password="kaipule452b.";
$chanrset="utf8";//编码
$dbname="db_blog";//数据库名
//(2)连接服务器
$con = mysqli_connect($local,$user,$password);
//var_dump($con);
if(!$con){
	echo '链接服务器失败'.mysqli_connect_error();
	die();
    }
//（3）选择数据库
$selectdb = mysqli_select_db($con,$dbname);
//var_dump($selectdb);
if(!$selectdb){
	echo '链接服务器失败';
	die();
	}
	//(4)设置编码
	mysqli_set_charset($con,$chanrset);
	//(5)执行SQl
	$sql = "select * from tb_notice where id=$id";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_object($result);
?>

<input type="button" value="返回主页面" onclick="window.location.href='main.html'"/>
<form name="form1" method="post" action="update_modify_ok.php">
	<table width="520" height="212" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    	<tr>
        	<td width="87" align="center">公告主题：</td>
            <td width="433" height="31"><input name="title" type="text" id="txt_title" size="40"/ value="<?php echo $row->title;?>">*</td>
        </tr>
        <tr>
        	<td width="124" align="center">公告内容：</td>
            <td><textarea name="content" cols="50" rows="8" id="txt_content"><?php echo $row->content;?></textarea></td>
        </tr>
        <tr>
        	<td height="40" colspan="2" align="center">
            	<input name="id" type="hidden" value="<?php echo $row->id;?>">
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