<?php
    header("Content-Type:application/json");

    //在进行操作前判断现在是否登录
    //打开或恢复session
    session_start();
    //未设置的话
    if(!isset($_SESSION['isLogin'])||$_SESSION['isLogin']==false){
        echo json_encode([
            'status' => 'noLogin'
        ]);
        die();
    }
    
    //获取原始请求体数据，php://input 允许读取原始的 POST 数据，这对于接收 JSON 数据是必要的
    $json = file_get_contents('php://input');

    //将JSON数据解码成PHP数组，如果希望得到一个对象可以省略第二个参数
    $data = json_decode($json,true);

    //检查是否正确解码JSON
    if(json_last_error() === JSON_ERROR_NONE){
        //获取字段
        $id = $data['id'];
        $book_name = $data['book_name'];
        $price = $data['price'];
        $publication_date = $data['publication_date'];
        $publishing_house = $data['publishing_house'];

        //导入连接
        include "conn.php";
        $conn = conn();
        if(is_string($conn)){
            echo json_encode([
                'status' => 'error',
                'message' => '修改失败！',
                'error_message' => $conn
            ]);
            die();
        }

        //(5)执行SQl
        //准备插入语句
        $sql = "update book set book_name=?,price=?,publication_date=?,publishing_house=? where id=?";
        $stmt = mysqli_prepare($conn,$sql);
        if($stmt === false){
            echo json_encode([
                'status' => 'error',
                'message' => '修改失败！',
                'error_message' => '修改失败！准备语句失败！'.mysqli_error($conn)
            ]);
            mysqli_close($conn);
            die();
        }
        //绑定参数
        mysqli_stmt_bind_param($stmt,'sssss', $book_name, $price, $publication_date, $publishing_house,$id);
        //执行语句
        if(mysqli_stmt_execute($stmt)){
            //执行成功
            echo json_encode([
                'status' => 'success',
                'message' => '修改成功！'
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => '修改失败！',
                'error_message' => '修改失败！'.mysqli_stmt_error($stmt)
            ]);
        }

        //(6)关闭结果集
        mysqli_stmt_close($stmt);
        //(7)关闭服务器
        mysqli_close($conn);
    }else{
        //处理JSON解码错误
        echo json_encode([
            'status' => 'error',
            'message' => '修改失败！',
            'error_message' => '修改失败！JSON解析失败！'
        ]);
    }
?>