<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	class Note{
		static $n=1;
		public function showMe(){
			echo '我们一共有'.self::$n.'个人!';
			self::$n++;	
		}	
	}
	$note = new Note();
	$note->showMe();
	echo '<br>';
	$noteb = new Note();
	$noteb->showMe();
	echo '<br>';
	echo '我们一共有'.Note::$n.'个人!';
?>
</body>
</html>