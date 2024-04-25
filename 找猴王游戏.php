<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form method="get" action="#">
    请输入猴子总数：<input type="text" name="m"><br />
    请输入要提出第几个猴子：<input type="text" name="n"><br />
    <input type="submit" value="开始">
</form>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $m = $_GET['m'];
	$n = $_GET['n'];
	}	
	$arrMonkey = range(1,$m);
	while(count($arrMonkey) > 1){
		for($i=1;$i<$n;$i++){
			//将开头删除
			$arrShift = array_shift($arrMonkey);
			//将开头删除的元素添加到末尾
			array_push($arrMonkey,$arrShift);
		}
		array_shift($arrMonkey);
	}
	if($arrMonkey[0] != 0){
	echo "猴王编号：".$arrMonkey[0];
	}
?>
</body>
</html>