import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  //配置项目于设置服务器开发的代理规则
  server:{
    proxy:{
      '/api':{//URL以api开头时，代理规则将被应用
        target:'http://localhost:82/src/LibrarySystem/php/',
        changeOrigin:true,//代理请求时会修改请求头中的 Origin 字段，使其与目标服务器的地址一致
        rewrite:(path) => path.replace(/^\/api/,'')//将路径中的/api前缀去掉
      }
    }
  }
})
