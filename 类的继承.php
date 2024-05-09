<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	//父类
	class site{
		private $url;
		public function setUrl($par){
			return $this->url=$par;	
		}	
		public function geyUrl(){
			return $this->url;	
		}
	}
	//子类
	class child_site extends site{
		public function output(){
			//@	屏蔽错误，类似于java中的抛异常
			echo "我们的网站的URL是：".@$this->url;	
		}
	}
	//实例化
	$child_site = new child_site();
	$child_site->setUrl("http://bjjqe.com/");
	echo $child_site->geyUrl()."<br>";
	$child_site->output();
?>
</body>
</html>