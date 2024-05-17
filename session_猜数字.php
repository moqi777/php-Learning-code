<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>猜数字游戏</title>
</head>

<body>
<?php
echo "猜数字游戏：";
session_start();

// **修改1: 增加isset判断，确保会话变量已设置**
if (isset($_SESSION['count']) && isset($_SESSION['rand'])) {
    $count = $_SESSION['count']; // 获取当前次数
    $count--; // 减少次数
    $_SESSION['count'] = $count;

    if ($count <= 0) {
        $_SESSION = array();
        session_destroy();
        echo '猜错了，次数用尽';
        exit();
    }

    // 判断输入的数是否正确
    $rand = $_SESSION['rand'];
    // **修改2: 增加isset和intval，确保输入为整数**
    $numb = isset($_GET['numb']) ? intval($_GET['numb']) : null;

    // **修改3: 增加输入验证，确保输入在1到10之间**
    if ($numb === null || $numb < 1 || $numb > 10) {
        echo '请输入一个1到10之间的整数。';
    } elseif ($numb < $rand) {
        echo '猜小了，你还有 ' . $count . ' 次机会';
    } elseif ($numb > $rand) {
        echo '猜大了，你还有 ' . $count . ' 次机会';
    } else {
        echo '猜中了，就是 ' . $numb;
        $_SESSION = array();
        session_destroy();
        exit();
    }
} else {
    // 如果 session 为空，说明是第一次，设置三分钟 session
    date_default_timezone_set("Etc/GMT-8"); // 设置时区
    $time = 180; // 给出 session 失效的时间 180s
    // 使用 setcookie 手动设置 session 失效时间
    setcookie(session_name(), session_id(), time() + $time, "/");
    // 设置 session 次数
    $_SESSION['count'] = 10;
    // 随机一个 1-10 的整数存入 session
    $_SESSION['rand'] = rand(1, 10);
    echo '欢迎参与猜数字游戏，你有 10 次机会。';
}

echo "<br>输入整数（1-10）：";
?>

<form method="get" action="">
    <input type="text" name="numb" />
    <input type="submit" value="确定" />
</form>

</body>
</html>
