<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品订货单</title>
</head>

<body>
<table border="1" width="400px" cellspacing="0px" cellpadding="5px">
<tr>
	<td>序号</td>
    <td>书名</td>
    <td>数量</td>
    <td>单价</td>
    <td>总价</td>
<tr/>

<?php
	$arr=array(100,50,100,300,500);
	echo '抽中了：'.$arr[rand(0,count($arr)-1)].'元'."<hr/>"; 
	
	//二维数组
	$order = array('序号' => array(1,'php编程',200,32.5),
					'书名' => array(2,'web编程基础',300,30.3),
					'数量' => array(3,'PHP编程',150,45),
					'单价' => array(4,'ASP技术',500,30));
	foreach($order as $v){
		echo "<tr>";
		foreach($v as $value){
			echo "<td>".$value."</td>";
		}
		$sum += $v[2]*$v[3];
		echo "<td>".$v[2]*$v[3]."</td>";
		echo "</tr>";
	}
?>
</table>
<?php
echo "小计".$sum;
echo "<hr>";
?>

<?php
	//数组的遍历
	//each遍历
	echo "each遍历"."<br>";
	$arr=array("asp","jsp","php");
	var_dump($arr);
	echo "<br>";
	var_dump(each($arr));
	echo "<br>";
	var_dump(each($arr));
	echo "<br>";
	var_dump(each($arr));
	echo "<br><br>";
	//list遍历
	echo "list遍历"."<br>";
	$arr=array("asp","jsp","php");
	list($v1,$v2,$v3)=$arr;
	echo $v1.'<br>';
	echo $v2.'<br>';
	echo $v3.'<br>';
	while(list($key,$value)=each($arr)){
		echo $key.'->'.$value;
		echo "<br>";
	}
	echo "<br>";
	//for循环遍历
	echo "for循环遍历"."<br>";
	for($i=0;$i<count($arr);$i++){
		echo $arr[$i];
		echo "<br>";	
	}
	echo "<br>";
	
	//数组与字符串的转换
	echo "数组与字符串的转换"."<br>";
	$str = "I love berjing!";
	//字符串转数组：explode(分隔符，字符串，数组最大长度，到达最大长度未分隔完剩余全在最后一个上，可选)
	print_r(explode(" ",$str));
	echo "<br><br>";
	
	//练习验证IP地址是否有效
	echo "IP地址是否有效"."<br>";
	$str = "59.51.24.54";
	$arr = explode(".",$str);
	if(count($arr) != 4){
		echo "IP地址无效";
	}else{
		foreach($arr as $v){
			if($v<0 || $v>255 || !is_numeric($v)){
				exit("IP地址无效");	
			}	
		}	
		echo "IP地址有效,IP前两位为".$arr[0].'.'.$arr[1].'.*.*';
	}
	
	//数组转字符串
	echo "<br><br>"."数组转字符串"."<br>";
	$arr = array('I','love','BeiJing!');
	echo implode(" ",$arr)."<br><br>";
	
	//统计数组元素个数
	echo "统计数组元素个数"."<br>";
	$arr = array(1,3,5,6,9,11);
	$cars=array(
	"Volvo"=>array("XC60","XC90"),
	"BMW"=>array("X3","X5"),
	"Toyota"=>array("HigHlander")
	);
	echo count($arr)."<br>";
	echo count($cars)."<br>";
	//递归统计二维数组中所有元素个数
	echo count($cars,1)."<br>";
?>
</body>
</html>