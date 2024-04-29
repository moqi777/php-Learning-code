<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$hobby = $_POST['hobby'];
		
		if(in_array("Ajax",$hobby) || in_array("FALSE",$hobby) || count($hobby)==0){
			echo "回答错误";
		}else if(count($hobby)!=3){
			echo "回答不全";
		}else{
			echo "回答正确";	
		}
		
	}else{
		$va = Array("Ajax","PHP","ASP","JSP","FALSE");
		echo "1.以下属于web开发语言的有哪几种?</br><form method='post' action='#'>";
		foreach($va as $v){
			echo "<input type='checkbox' name='hobby[]' value='".$v,"'/><label>".$v."</label>&nbsp;";
		}
		echo "<input type='submit' value='提交'/></form>";
	}
?>
</body>
</html>