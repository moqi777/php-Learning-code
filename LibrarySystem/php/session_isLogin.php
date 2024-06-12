<?php
    //打开或恢复session
    session_start();

    //未设置的话
    if(!isset($_SESSION['isLogin'])){
        $_SESSION['isLogin']=false;
    }
    //将session返回
    echo json_encode([
        'isLogin' => $_SESSION['isLogin']
    ]);
?>