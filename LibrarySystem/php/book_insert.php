<?php
    header("Content-Type:application/json");
    //获取原始请求体数据，php://input 允许读取原始的 POST 数据，这对于接收 JSON 数据是必要的
    $json = file_get_contents('php://input');

    //将JSON数据解码成PHP数组，如果希望得到一个对象可以省略第二个参数
    $data = json_decode($json,true);

    //检查是否正确解码JSON
    if(json_last_error() === JSON_ERROR_NONE){
        //获取字段
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
                'message' => '添加失败！',
                'error_message' => $conn
            ]);
            die();
        }

        //(5)执行SQl
        //准备插入语句
        $sql = "INSERT INTO book(book_name,price,publication_date,publishing_house) 
                VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        if($stmt === false){
            echo json_encode([
                'status' => 'error',
                'message' => '添加失败！',
                'error_message' => '添加失败！准备语句失败！'.mysqli_error($conn)
            ]);
            mysqli_close($conn);
            die();
        }
        //绑定参数
        mysqli_stmt_bind_param($stmt,'ssss', $book_name, $price, $publication_date, $publishing_house);
        //执行语句
        if(mysqli_stmt_execute($stmt)){
            //执行成功
            echo json_encode([
                'status' => 'success',
                'message' => '添加成功！'
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => '添加失败！',
                'error_message' => '添加失败！'.mysqli_stmt_error($stmt)
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
            'message' => '添加失败！',
            'error_message' => '添加失败！JSON解析失败！'
        ]);
    }
?>