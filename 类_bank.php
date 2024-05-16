-[<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	class Bank{
		static $bankname;
		private $username;
		private $password;
		private $balance;
		private $turnover;
		//开户 构造方法
		public function __construct($username,$password,$sturnover){
			$this->username=$username;
			$this->password=$password;
			$this->turnover=$sturnover;
			$this->balance=$sturnover-10;
			echo $this->username.'开户成功，账户余额'.$this->balance.'元<br>';
		}
		//存款
		public function deposit($turnover){
			$this->balance+=$turnover;
			echo '您好，您的账户里存入'.$turnover.'元，当前余额'.$this->balance.'元<br>';
		}
		//取款
		public function withdrawl($password,$turnover){
			if($this->password!=$password){
				echo '你输入的密码错误<br>';	
			}elseif($this->balance<$turnover){
				echo '对不起，账户余额不足<br>';	
			}else{
				$this->balance-=$turnover;
				echo $this->username.'您好，您的账户已取出'.$turnover.'元，当前余额'.$this->balance.'元<br>';	
			}
		}
		//欢迎的方法
		static function welcome(){
			echo '欢迎来到'.self::$bankname.'----------------<br>';	
		}
		//提醒的方法
		static function welcomeNext(){
			echo '请携带好随身财务，欢迎下次光临'.self::$bankname.'-------------';	
		}
	}
	
	Bank::$bankname='中国银行';
	Bank::welcome();
	$s=new bank('小梦','123456',100);
	$s->deposit(1000);
	$s->withdrawl('123',100);
	$s->withdrawl('123456',2000);
	$s->withdrawl('123456',500);
	Bank::welcomeNext();
?>
</body>
</html>