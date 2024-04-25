<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<table border="1px" width="400px" height="250px" cellspacing="0px" cellpadding="20px">
	<tr>
    	<form method="get" action="#"> 
        	<td>添加投票选项</td>
            <td>
            	<textarea name="text" cols="25px" rows="5px"></textarea>
            <br />
            	<span style="color:red">注意：每个选项间用*分隔</span>
            </td>
            <td><input type="submit" value="提交"/></td>
        </form>
    </tr>
    <tr>
    	<td>投票选项</td> 
        <td colspan="2">
        <?php
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$text = $_GET['text'];
				$arrText = explode("*",$text);
				if($arrText[0] != ""){
					foreach($arrText as $v){
					echo "<input type='checkbox'><label>".$v."</label><br>";
					}		
				}
			}
		?>
        </td>
    </tr>
</table>
</body>
</html>