<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	if(isset($_POST['token']) && $_POST['token']=='upload'){
		if($_FILES['upload']['name']==''){
			echo '上传失败，请选择文件';
			die();	
		}elseif($_FILES['upload']['size']>2*1024*1024){
			echo '上传失败，文件不能超过2MB';
			die();
		}else{
			$temp_name=$_FILES['upload']['tmp_name'];
			$name=$_FILES['upload']['name'];
			$trail = substr($name,strpos($name,'.')+1);
			if($trail == 'jpg' || $trail == 'gif' || $trail == 'png'){
				$dst_name="D:\AppServ\www\upload/".$name;
				move_uploaded_file($temp_name,$dst_name);
				echo '上传成功';
			}else{
				echo '不支持该类型文件';		
			}
		}
	}else{
?>
<form method="post" action="" enctype="multipart/form-data">
图片标题：<input type="text" name="title"/><br />
<input type="file" name="upload"/><br />
<input type="submit" value="提交"/>
<input type="hidden" name="token" value="upload"/>
</form>
<?php
	}
?>
</body>

</html>