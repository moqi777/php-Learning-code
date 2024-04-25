<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
    <form action="#" method="post">
        计算器：<input type="text" name="numb1" value="<?php echo isset($_POST['numb1']) ? $_POST['numb1'] : ''; ?>"/>
        <select name="oper">
        <option value="+" <?php echo $_POST['oper']=='+'?'selected':'';?>>+</option>
        <option value="-" <?php echo $_POST['oper']=='-'?'selected':'';?>>-</option>
        <option value="*" <?php echo $_POST['oper']=='*'?'selected':'';?>>*</option>
        <option value="/" <?php echo $_POST['oper']=='/'?'selected':'';?>>/</option>
        </select>
        <input type="text" name="numb2" value="<?php echo isset($_POST['numb2']) ? $_POST['numb2'] : ''; ?>"/>
        <input type="submit" value="计算" name="sub"/>
    </form>
<?php
	$numb1 = $_POST['numb1'];
	$numb2 = $_POST['numb2'];
	$oper = $_POST['oper'];
	if(isset($_POST['sub'])){
		switch($oper){
			case '+':
				echo $numb1 + $numb2;
				break;	
			case '-':
				echo $numb1 - $numb2;
				break;	
			case '*':
				echo $numb1 * $numb2;
				break;	
			case '/':
				if($numb2 == 0){
					echo "被除数不可为0";	
				}else{
					echo $numb1 / $numb2;
				}
				break;	
			default:
				echo "错误的运算符";
		}
	}
?>
</body>
</html>