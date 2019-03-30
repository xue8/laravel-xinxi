## 问答系统
基于`Laravel`开发的问答社区，编辑器支持`Markdown`，前端布局采用响应式。可配合	🎨[segmentfault爬虫](https://github.com/xue8/scrapy_segmentfault) 爬虫使用。
## 效果展示
### 网站前台
**PC端**：    

![](https://user-gold-cdn.xitu.io/2019/3/30/169cd77530ed1859?w=1901&h=938&f=png&s=223432)
**手机端**：     

![](https://user-gold-cdn.xitu.io/2019/3/30/169cd77e2594c654?w=453&h=795&f=png&s=108771)

### 问答内容页面
**PC端**：     
![](https://user-gold-cdn.xitu.io/2019/3/30/169cd79c0590d871?w=850&h=937&f=png&s=86280)

**手机端**：       
![](https://user-gold-cdn.xitu.io/2019/3/30/169cd7a17f1af601?w=444&h=799&f=png&s=61209)

### 问答发布
**PC端**：    
![](https://user-gold-cdn.xitu.io/2019/3/30/169cd7b94105df2d?w=1341&h=842&f=png&s=62796)

**手机端**：    
![](https://user-gold-cdn.xitu.io/2019/3/30/169cd7bcb5ca7c88?w=457&h=786&f=png&s=44135)

## 依赖 
#### Laravel 
- laravel >= 5.6
- Passport
- Mews
- guzzle

#### PHP 
- PHP >= 7.1.3
- OpenSSL PHP
- PHP PDO 扩展
- PHP Mbstring 扩展
- PHP Tokenizer 扩展
- PHP XML 扩展
- PHP Ctype 扩展
- PHP JSON 扩展
- PHP Fileinfo扩展

#### Mysql 
- mysql >= 5.5

## 安装配置 
1. 上传源码到服务器
2. 将`xinxi.sql`导入数据库
3. 配置`.env`里面的数据库信息
4. 配置`.env、/config/mail.php`邮件信息
5. 修改`/resources/views/functions/email.blade.phpd`的邮件激活链接成你的域名。
