<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
/*
	class SimpleClass{
		public $nationality = "China";
		public $age = "23";	
	}
	$S = new SimpleClass();
	echo "女孩的国际是:".$S->nationality."<br>";
	echo "女孩的国际是:".$S->age."<br>"; 
*/	

	class SimpleClass{
		public function __construct($name,$height,$nationality,$sex,$age){
			$this->name=$name;	
			$this->height=$height;
			$this->nationality=$nationality;
			$this->sex=$sex;
			$this->age=$age;
		}	
		public function modelsize(){
			if($this->height<180 and $this->age<20){
				return $this->name."，符合模特招聘的要求！";	
			}else{
				return $this->name."，不符合模特招聘的要求!";	
			}
		}
	}	
	
	$gril = new SimpleClass("糖糖","172","China","女","16");
	echo $gril->modelsize();
?>
</body>
</html>