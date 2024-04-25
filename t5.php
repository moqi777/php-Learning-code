<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	for($i=9;$i>=1;$i--){
		for($j=$i;$j<=9;$j++){
			echo "$j ";
		}
		echo "<br/>"; 
	}
	echo "<p/>";
	
	for($i=1;$i<=9;$i++){
		for($j=1;$j<=$i;$j++){
			echo "$j*$i=".$i*$j."&nbsp;&nbsp;";
		}
		echo "<br/>";
	}
?>
</body>
</html>