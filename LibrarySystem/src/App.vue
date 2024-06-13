<template>
  <tushu v-if="isLogin"/>
  <div class="background-container" v-if="!isLogin">
    <div class="title-container">
      <h2 class="title">图 书 馆</h2>
    </div>
    <!-- 登录页面 -->
    <div class="login-container" v-if="loginOrRegister==1">
      <h2>登录</h2><hr/><br/><br/>
      <el-form :model="form" label-width="auto" style="max-width: 600px;">
        <el-form-item label="用户名：">
          <el-input v-model="form.name"/>
        </el-form-item>
        <br/>
        <el-form-item label="密码：">
          <el-input v-model="form.password" type="password"/>
        </el-form-item>
        <br/>
        <el-form-item>
          <div class="item-container">
            <el-button type="primary" @click="login()" style="width: 50%;">登录</el-button>
            <!-- <el-button @click="resetForm()" style="width: 20%;">重置</el-button> -->
          </div>
        </el-form-item>
        <div class="a-container">
          <a @click="loginOrRegister=0;resetForm()" class="a">注册</a>
        </div>
      </el-form>
    </div>
    <!-- 注册页面 -->
    <div class="register-container" v-if="loginOrRegister==0">
      <h2>注册</h2><hr/><br/>
      <el-form :model="form" label-width="auto" style="max-width: 600px;">
        <el-form-item label="* 账号：">
          <el-input v-model="form.name" placeholder="由数字或字母组成"/>
        </el-form-item>
        <el-form-item label="* 密码：">
          <el-input v-model="form.password" type="password" placeholder="由数字或字母组成"/>
        </el-form-item>
        <el-form-item label="* 确认密码：">
          <el-input v-model="form.passwordTo" type="password" placeholder="再次输入密码"/>
        </el-form-item>
        <el-form-item label="* 真实姓名：">
          <el-input v-model="form.realName"/>
        </el-form-item>
        <el-form-item label="性别：">
          <el-radio-group v-model="form.gender">
            <el-radio value="man">男</el-radio>
            <el-radio value="girl">女</el-radio>
          </el-radio-group>
        </el-form-item>
        <el-form-item label="QQ：">
          <el-input v-model="form.qq"/>
        </el-form-item>
        <el-form-item label="联系方式：">
          <el-input v-model="form.phone"/>
        </el-form-item>
        <el-form-item label="电子邮箱：">
          <el-input v-model="form.mail"/>
        </el-form-item>
        <br/>
        <el-form-item>
          <div class="item-container">
            <el-button type="primary" @click="register()" style="width: 20%;margin-right: 50px;">注册</el-button>
            <el-button @click="resetForm()" style="width: 20%;">重置</el-button>
          </div>
        </el-form-item>
        <div class="a-container">
          <a @click="loginOrRegister=1;resetForm()" class="a">登录</a>
        </div>
      </el-form>
    </div>

  </div>
  <!-- 水印 -->
  <div class="watermark" v-if="false">
    <table>
      <tr v-for="row in 9" :key="row">
        <td v-for="col in 8" :key="col">{{ '230311371 郑伊龙' }}</td>
      </tr>
    </table>
  </div>
</template>

<script setup>
import tushu from './components/tushu.vue';
// 类似于ref，ref适用于单个数据，reactive适用于对象数组等
import {reactive,onMounted,ref} from 'vue'
import { ElMessage } from 'element-plus';//信息弹窗包
import axios from 'axios';
//判断是该显示登录页面还是注册页面,1是登录，0是注册
const loginOrRegister = ref(1);
//用于存储php返回回来的数据
const message =ref('');
//存储用户是否登录的session
const isLogin = ref(false);
//存储登录信息
const form = reactive({
  name:'',
  password:'',
  passwordTo: '', // 注册时需要的确认密码字段
  realName: '', // 注册时需要的真实姓名字段
  gender: '', // 注册时需要的性别字段
  qq: '', // 注册时需要的QQ字段
  phone: '', // 注册时需要的联系方式字段
  mail: '' // 注册时需要的电子邮箱字段
})

const login=async()=>{
  if(form.name==''){
    ElMessage({
      message:'用户名为空'
    })
  }else if(form.password==''){
    ElMessage({
      message:'密码为空',
      type:'warning'
    })
  }else{
    //发起请求
    await fetchData('login');
    if(message.value.status=='success'){
      //登录成功
      ElMessage({
        message: message.value.message,
        type: 'success',
      })
      //登录成功刷新页面跳转进入
      location.reload();
      //清空表单数据
      resetForm();
    }else if(message.value.status=='error'){
      //注册失败
      console.log(message.value.error_message);
      ElMessage.error(message.value.message);
    }
    //最后记得清空message防止出错
    message.value = '';
  }
}

//注册
const register = async()=>{
  /*
    ^：表示匹配字符串的开始。它确保匹配从字符串的起始位置开始。
    [a-zA-Z0-9]：表示一个字符集，匹配其中的任何一个字符。具体来说，它包含：
      a-z：所有小写字母 (a 到 z)。
      A-Z：所有大写字母 (A 到 Z)。
      0-9：所有数字 (0 到 9)。
    +：表示前面的字符集可以出现一次或多次。即，字符串中可以有一个或多个字母或数字。
    $：表示匹配字符串的结束。它确保匹配到字符串的末尾。
  */
  const regex = /^[a-zA-Z0-9]+$/;
  if(form.name==''||form.password==''||form.passwordTo==''||form.realName==''){
    ElMessage({
    message:'必填项为空 *'
  })
  //test 方法用于测试一个字符串是否匹配正则表达式
  }else if(!regex.test(form.name)||!regex.test(form.password)){
    ElMessage({
    message:'账号或密码格式错误！'
    })
  }else if(form.password!=form.passwordTo){
    ElMessage({
    message:'两次密码不一致'
    })
  }else{
    //发起请求,注意：await关键字必须在asyns函数里面使用，调用异步函数时也必须使用await关键字
    await fetchData('register');
    if(message.value.status=='success'){
      //注册成功
      ElMessage({
        message: message.value.message,
        type: 'success',
      })
      //注册成功跳转登录页面
      loginOrRegister.value = 1;
      //清空表单数据
      resetForm();
    }else if(message.value.status=='error'){
      //注册失败
      console.log(message.value.error_message);
      ElMessage.error(message.value.message);
    }
    //最后记得清空message防止出错
    message.value = '';
  }
}

//异步函数发送请求
const fetchData = async(router)=>{
    try{
        //将表单数据转换成json
        let jsonForm = JSON.stringify(form);
        //发送post请求到'/api/register.php'，请求成功将数据赋值给message
        const response = await axios.post('/api/'+router+'.php',jsonForm,{
          headers:{
            'Content-Type':'application/json'
          }
        });
        //接受前端返回回来的数据
        message.value = response.data;
    }catch(error){
        console.error('There was an error!',error);
    }
};

//每次刷存页面自动查询session
onMounted(async()=>{
  await fetchData('session_isLogin');
  isLogin.value = message.value.isLogin;
  message.value = '';
})

//重置
const resetForm=()=>{
  form.name = '';
  form.password = '';
  form.passwordTo = '';
  form.realName = '';
  form.gender = '';
  form.qq = '';
  form.phone = '';
  form.mail = '';
}


</script>
