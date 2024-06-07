<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改公告</title>
</head>

<body>
<input type="button" value="返回主页面" onclick="window.location.href='main.html'"/>	
<table class="table1">
	<tr>
  		<td width="180">公告标题</td>  
        <td width="397">公告内容</td>
        <td width="55" style="width:70px">编辑公告</td>
    </tr>
<?php
	if($_GET['page']==""){
		$_GET['page']=1;	
	}
	if(is_numeric($_GET['page'])){
		$page_size=4;//每页显示四条数据	
	}
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
	$query = "select id from tb_notice order by id desc";
	$result = mysqli_query($con,$query);//查询符合条件的总条数
	$message_count=mysqli_num_rows($result);
	//求页数
	$page_count=ceil($message_count/$page_size);
	//计算下一页从第几行开始循环
	$offset=($_GET['page']-1)*$page_size;
	$sql = mysqli_query($con,"select * from tb_notice order by id desc limit $offset,$page_size");
	$row=mysqli_fetch_object($sql);
	if(!$row){
		echo "<font color='red'>暂无公告信息</font>";	
	}
	do{
?>    
	<tr>
    	<td style="font=size:14px;text-align:left;"><?php echo $row->title;?></td>
        <td style="font=size:14px;text-align:left;"><?php echo $row->content;?></td>
        <td align="center"><a href="modify.php?id=<?php echo $row->id;?>"><img src="images/edit.jpg" width="50" height="50" border="0"/></a></td>
    </tr>
<?php
	}while($row=mysqli_fetch_object($sql));
?>    
</table>
	<p>当前第<?php echo $_GET['page']?>页</p>
    <form action="update_notice.php" method="get">
        <input type="hidden" name="page" value="<?php echo $_GET['page']-1?>"/>
        <input type="submit" value="上一页"/>	
    </form>
	<form action="update_notice.php" method="get">
    	<input type="hidden" name="page" value="<?php echo $_GET['page']+1?>"/>
    	<input type="submit" value="下一页"/>	
    </form>
</body>
</html>