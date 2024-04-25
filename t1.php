<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
	<?php
		/*
			$a = true;
			if ($a == true)
				echo '变量$a为真';
			else
				echo '变量$a为假！！';
		*/
		/*
		$s1 = 'hello';
		echo '$s1 是字符串';
		echo '<br>';
		echo "$s1 是字符串";
		echo '<br>';
		echo "\$s1 是字符串";
		*/
		$string = 'php';
		echo $string."<br>";
		echo "$string 是世界上最好的语言<br>";
		echo "\\ $string 是世界上最好的语言<br>";
		echo "\" $string 是世界上最好的语言 \"<br>";
		echo "\$ $string 是世界上最好的语言 \$<br>";
		
		//定界符，以<<<开头，后面跟着自主命名符号，头尾符号名需相同，且尾部符号要定格，中间内容以字符串的形式显示
		$heredoc_str = <<<EOD
		定界符实例<br>
		字符串<br>
		美元符号$<br>
		$string
		<ul>
			<li>PHP是世界上最好的语言</li>
			<li>PHP是最受欢迎的语言</li>
		</ul>
EOD;
		echo $heredoc_str;
		
		//整形最大值常量
		echo PHP_INT_MAX."<br>";
		
		//数组
		$num[0] = 'a';
		$num[1] = 'b';
		$num[2] = 'c';
		var_dump($num);
	?>
</body>
</html>