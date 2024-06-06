<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查询公告</title>
</head>

<body>
<input type="button" value="返回主页面" onclick="window.location.href='main.html'"/>	
<form name="form1" method="post" action="search_notice.php">
	查询关键字&nbsp;
    <input name="keyword" type="text" id="keyword" size="40"/>
    &nbsp;<input type="submit" name="Submit" value="搜 索" onclick="return check(form)"/>
</form>
<?php
$keyword = $_POST['keyword'];
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
	$sql = mysqli_query($con,"select * from tb_notice where title like '%$keyword%' or content like '%$keyword%'");
	$row = mysqli_fetch_object($sql);
	if(!$row){
		echo "<font color='red'>您搜索的信息不存在，请使用类似的关键字进行检索！</font>";	
	}
	do{
?>
	<br />
	<tr>
    	<td style="font-size:14px;text-align:left"><b><?php echo $row->title;?></b></td><br />
        <td style="font-size:14px;text-align:left">
			<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->content;?>
        </td>
    </tr>		
    <br /><br /><br />
<?php
	}while($row=mysqli_fetch_object($sql));
	
	//(6)关闭结果集
	mysqli_free_result($result);
	//(7)关闭服务器
	mysqli_close($con);
?>
</body>
<script>
function check(form){
	if(form.keyword.value==""){
		alert("请输查询关键字！");	
		form.keyword.focus();
		return false;
	}
	form.submit();
}
</script>
</html>