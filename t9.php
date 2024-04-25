<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
echo strlen("This is a Character string:\rabc_@123");
echo "<hr/>";
echo strlen("之音");
echo "<hr/>";
$str = "Hello World!";
echo $str."<br>";
echo trim($str,"Hed!")."<br>";
echo rtrim($str,"ld!")."<br>";
echo ltrim($str,"He!")."<br>";
?>
</body>
</html>