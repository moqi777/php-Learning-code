<template>
    <div>
        <h1>{{message}}</h1>
    </div>
</template>

<script setup>
    import {ref,onMounted} from 'vue';
    import axios from 'axios';

    //定义响应式变量
    const message =ref('');

    //异步函数发送请求
    const fetchData = async()=>{
        try{
            //发送get请求到'/api/api.php'，请求成功将数据赋值给message
            const response = await axios.get('/api/api.php');
            message.value = response.data.message;
        }catch(error){
            console.error('There was an error!',error);
        }
    };

    //组件挂载时调用
    onMounted(()=>{
        fetchData();
    });
</script>