<?php
function conn() {
    // 导入配置文件
    include "config.php";
    
    // 连接服务器
    $con = mysqli_connect($local, $user, $password);
    if (!$con) {
        return '连接服务器失败: ' . mysqli_connect_error();
    }

    // 选择数据库
    $selectdb = mysqli_select_db($con, $dbname);
    if (!$selectdb) {
        return '选择数据库失败: ' . mysqli_error($con);
    }

    // 设置编码
    if (!mysqli_set_charset($con, $chanrset)) {
        return '设置编码失败: ' . mysqli_error($con);
    }

    // 返回连接
    return $con;
}
?>