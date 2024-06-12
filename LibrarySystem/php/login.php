<?php
    header("Content-Type:application/json");
    //获取原始请求体数据，php://input 允许读取原始的 POST 数据，这对于接收 JSON 数据是必要的
    $json = file_get_contents('php://input');

    //将JSON数据解码成PHP数组，如果希望得到一个对象可以省略第二个参数
    $data = json_decode($json,true);

    //检查是否正确解码JSON
    if(json_last_error() === JSON_ERROR_NONE){
        //获取字段
        $name = $data['name'];
        $password = $data['password'];

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
        $sql = "select name,password from user where name = ?";
        $stmt = mysqli_prepare($conn,$sql);
        if($stmt === false){
            echo json_encode([
                'status' => 'error',
                'message' => '登录失败！',
                'error_message' => '查询用户失败！准备语句失败！'.mysqli_error($conn)
            ]);
            mysqli_close($conn);
            die();
        }

        //绑定参数并执行查询
        mysqli_stmt_bind_param($stmt,'s',$name);
        mysqli_stmt_execute($stmt);
        //存储返回值
        mysqli_stmt_store_result($stmt);
        //绑定结果变量，第一个参数是已执行sql语句的句柄
        mysqli_stmt_bind_result($stmt,$result_name,$result_password);
        //获取结果集
        if(mysqli_stmt_fetch($stmt)){
            if($password === $result_password){
                echo json_encode([
                    'status' => 'success',
                    'message' => '登录成功！'
                ]);

                //登录成功后将用户存入session中
                date_default_timezone_set("Etc/GMT-8");//设置时区
                session_start();//启动或恢复session
                $time = 30*60;//给出session实效的时间	半个小时
                //使用setcookie手动设置session实效时间
                setcookie(session_name(),session_id(),time()+$time,"/");
                //设置session名
                $_SESSION['isLogin']=true;

            }else{
                echo json_encode([
                    'status' => 'error',
                    'message' => '登录失败！密码错误！'
                ]);
            }
        }else{
            //用户名不存在
            echo json_encode([
                'status' => 'error',
                'message' => '登录失败！用户名不存在！'
            ]);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }else{
        //处理JSON解码错误
        echo json_encode([
            'status' => 'error',
            'message' => '登录失败！',
            'error_message' => '注册失败！JSON解析失败！'
        ]);
    }

?>