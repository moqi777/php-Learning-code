<template>
  <div class="background-container">
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
            <el-button type="primary" @click="login()" style="width: 20%;margin-right: 50px;">登录</el-button>
            <el-button @click="resetForm()" style="width: 20%;">重置</el-button>
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
          <el-input v-model="form.name"/>
        </el-form-item>
        <el-form-item label="* 密码：">
          <el-input v-model="form.password" type="password"/>
        </el-form-item>
        <el-form-item label="* 确认密码：">
          <el-input v-model="form.passwordTo" type="password"/>
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
</template>

<script setup>
// 类似于ref，ref适用于单个数据，reactive适用于对象数组等
import {reactive,ref} from 'vue'
import { ElMessage } from 'element-plus';
//判断是该显示登录页面还是注册页面,1是登录，0是注册
const loginOrRegister = ref(1);
//存储登录细腻
const form = reactive({
  name:'',
  password:''
})

const login=()=>{
  if(form.name==''){
    ElMessage({
      message:'用户名为空'
    })
  }else if(form.password==''){
    ElMessage({
      message:'密码为空',
      type:'warning'
    })
  }
  console.log(form);
}

//注册
const register = ()=>{
  if(form.name==''||form.password==''||form.passwordTo==''||form.realName==''){
    ElMessage({
    message:'必填项为空 *'
  })
  }else if(form.password!=form.passwordTo){
    ElMessage({
    message:'两次密码不一致'
  })
  }
}
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
