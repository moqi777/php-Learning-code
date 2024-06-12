<template>
<div class="background-container-tushu">
  <a @click="exit()" class="a-tushu">退出</a>

  <div class="button-container">
    <el-button type="primary" @click="showAddDialog = true" class="large-button">增加</el-button>
    <el-button type="primary" @click="delSelected()" class="large-button">删除所选</el-button>
  </div>

  <el-table border :data="books" ref="tableData" class="table-container">
      <el-table-column align="center" header-align="center" fixes="left" type="selection" width="60px"></el-table-column>
      <el-table-column align="center" header-align="center" width="100" label="id" prop="id"></el-table-column>
      <el-table-column align="center" header-align="center" width="250" label="书名" prop="book_name"></el-table-column>
      <el-table-column align="center" header-align="center" width="150" label="价格" prop="price"></el-table-column>
      <el-table-column align="center" header-align="center" width="200" label="出版日期" prop="publication_date"></el-table-column>
      <el-table-column align="center" header-align="center" width="250" label="出版社" prop="publishing_house"></el-table-column>
      <el-table-column align="center" header-align="center" width="140" label="操作">
          <!-- scope 包含了当前行的数据以及一些其他信息，比如索引、行对象等，我们可以通过 scope 来访问到当前行的数据，比如 scope.row、scope.column 等 -->
          <template #default="scope">
              <el-button type="success" @click="showEdit(scope.row)" size="small" circle icon="edit"></el-button>
              <el-button type="danger" @click="del(scope.row.id)" size="small" circle icon="delete"></el-button>
          </template>
      </el-table-column>
  </el-table>

  <!-- 新增的弹出框 -->
  <el-dialog style="width: 40%;height:350px;" v-model="showAddDialog" @closed="dialogClosed()" :center="true" title="添加书籍">
    <el-form style="padding:20px 30px;">
        <el-form-item label="书名：" label-width="100px">
            <!-- 在组件中会自动加载ref，所以不需要.value -->
            <el-input v-model="addForm.book_name"></el-input>
        </el-form-item>
        <el-form-item label="价格：" label-width="100px">
            <el-input-number v-model="addForm.price"></el-input-number>
        </el-form-item>
        <el-form-item label="出版日期：" label-width="100px">
            <el-date-picker type="date" placeholder="选择日期" v-model="addForm.publication_date"></el-date-picker>
        </el-form-item>
        <el-form-item label="出版社：" label-width="100px">
            <el-input v-model="addForm.publishing_house"></el-input>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" style="margin: auto;" @click="doAdd()"  class="large-button">增加</el-button>
        </el-form-item>
    </el-form>
</el-dialog>
    <!-- 修改的弹出框 -->
    <el-dialog style="width: 40%;height:400px;" v-model="showEditDialog" @closed="dialogClosed()" :center="true" title="修改书籍">
      <el-form style="padding:20px 30px;">
        <el-form-item label="id：" label-width="100px">
          <el-input readonly v-model="addForm.id"></el-input>
      </el-form-item>
        <el-form-item label="书名：" label-width="100px">
          <el-input v-model="addForm.book_name"></el-input>
      </el-form-item>
      <el-form-item label="价格：" label-width="100px">
          <el-input-number v-model="addForm.price"></el-input-number>
      </el-form-item>
      <el-form-item label="出版日期：" label-width="100px">
          <el-date-picker type="date" placeholder="选择日期" v-model="addForm.publication_date"></el-date-picker>
      </el-form-item>
      <el-form-item label="出版社：" label-width="100px">
          <el-input v-model="addForm.publishing_house"></el-input>
      </el-form-item>
      <el-form-item>
          <el-button type="primary" style="margin: auto;" @click="doModify()"  class="large-button">确定</el-button>
      </el-form-item>
      </el-form>
  </el-dialog>
</div>
</template>

<script setup>
  import { onMounted,ref } from 'vue';
  import { ElMessage,ElMessageBox } from 'element-plus';//信息弹窗包和弹出框包
  import axios from 'axios';

  //保存页面和修改页面的开关
  let showAddDialog = ref(false);
  let showEditDialog = ref(false);
  //变量存储当前处理行数据
  let addForm = ref({}); 
  //创建一个响应式引用，用于对多选行操作
  let tableData = ref();

  const message = ref('');
  const books = ref([]);

  //添加书籍
  const doAdd = async()=>{
    await fetchData('book_insert');
    if(message.value.status=='success'){
      //添加成功
      ElMessage({
        message: message.value.message,
        type: 'success',
      })
      //清空addForm
      dialogClosed();
      //设置延迟刷新页面，使弹窗走完
      setTimeout(() => {
        location.reload();
      }, 500);
    }else if(message.value.status=='error'){
      //添加失败
      console.log(message.value.error_message);
      ElMessage.error(message.value.message);
    }
    //最后记得清空message防止出错
    message.value = '';
  }

  //删除书籍
  

  const exit = async()=>{
    await fetchData('exit');
    location.reload();
  }

  //打开修改框，并将数据放入
  const showEdit = row =>{
    showEditDialog.value = true;
    addForm.value.id = row.id;
    addForm.value.book_name = row.book_name;
    addForm.value.price = row.price;
    addForm.value.publication_date = new Date(row.publication_date);
    addForm.value.publishing_house = row.publishing_house;
  }

  //弹窗关闭时清空addForm
  const dialogClosed = () =>{
    addForm.value = {};
  }

  //页面刷新自动调用查询数据
  onMounted(async()=>{
    await fetchData('book_view');
    if(message.value.status=='success'){
      //查询成功
      console.log(message.value.message);
      //将查询到的数据存入books
      books.value = message.value.data;
    }else if(message.value.status=='error'){
      //查询失败
      console.log(message.value.error_message);
      ElMessage.error(message.value.message);
    }
    //最后记得清空message防止出错
    message.value = '';
  })

  //异步函数发送请求
  const fetchData = async(router)=>{
      try{
          //将表单数据转换成json
          let jsonForm = JSON.stringify(addForm.value);
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
</script>

<style scoped>
  .background-container-tushu {
    background-image: url('../assets/img/book2.jpg');
    background-repeat: no-repeat;
    background-size: 100% 100%;/*填充全屏*/
    background-attachment: fixed;
    height: 100vh; /* 确保 div 高度与视口一致 */
    display: flex;
    flex-direction: column;/*垂直方向排列子元素*/
    align-items: center;/*垂直方向对齐*/
  }

  .button-container{
    width: 400px;
    margin-top: 80px;
    display: flex;
    justify-content: space-between;/*两端对齐，空白部分都留在中间*/
    margin-bottom: 50px;/*按钮和表格之间的间距*/
  }
  .large-button{
    font-size: 20px; /* 增加字体大小 */
    padding: 20px 30px; /* 增加内边距 */
  }

  .table-container{
    width: 60%;
    height: 70%;
  }

  .a-tushu {
    font-size: 40px;
    text-decoration: none; /* 移除下划线 */
    color: white; /* 设置文字颜色为蓝色 */
    font-weight: bold; /* 设置文字加粗 */
    transition: color 0.3s ease; /* 添加颜色变化的过渡效果 */
    cursor: pointer;
    position: fixed;
    top: 50px;
    right: 80px;
  }
  .a-tushu:hover {
    color: #0056b3; /* 设置鼠标悬停时的文字颜色 */
  }
  .a-tushu:focus {
    outline: none; /* 移除点击时的虚线框 */
  }
  .a-tushu:active {
    color: #002752; /* 设置点击时的文字颜色 */
  }
</style>