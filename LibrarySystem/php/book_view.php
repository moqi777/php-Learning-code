<?php
    header("Content-Type:application/json");

    //导入连接
    include "conn.php";
    $conn = conn();
    if(is_string($conn)){
        echo json_encode([
            'status' => 'error',
            'message' => '登录失败！',
            'error_message' => $conn
        ]);
        die();
    }

    //执行sql
    $sql = "select * from book";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo json_encode([
            'status' => 'error',
            'message' => '查询失败！',
            'error_message' => mysqli_error($conn)
        ]);
        mysqli_close($conn);
        die();
    }

    // 将结果转换为关联数组
    $books = [];
    //将查询结果逐行提取并存入数组 $books
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    // 返回 JSON 数据
    echo json_encode([
        'status' => 'success',
        'message' => '查询成功！',
        'data' => $books
    ]);

    //(6)关闭结果集
	mysqli_free_result($result);
	//(7)关闭服务器
	mysqli_close($conn);
?>