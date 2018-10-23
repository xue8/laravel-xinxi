问答系统
====
依赖
----
####Laravel
> 
#####laravel >= 5.6
#####Passport：安装教程请看
https://laravel-china.org/docs/laravel/5.7/passport/2270
#####Mews：安装教程请看https://packagist.org/packages/mews/captcha
#####guzzle：安装教程请看
https://laravel-china.org/docs/laravel/5.7/mail/2283


####PHP
> 
#####PHP >= 7.1.3
#####OpenSSL PHP
#####PHP PDO 扩展
#####PHP Mbstring 扩展
#####PHP Tokenizer 扩展
#####PHP XML 扩展
#####PHP Ctype 扩展
#####PHP JSON 扩展
#####PHP Fileinfo扩展

####Mysql
> 
#####mysql >= 5.5

安装配置
----
#####1. 上传源码到服务器
#####2. 上传数据库，数据库下载地址
链接: https://pan.baidu.com/s/1FD-7v5sZI-3RYblMly3_CA 提取码: qvkj
#####3. 配置.env里面的数据库信息
#####4. 配置.env、/config/mail.php邮件信息
#####5. 修改/resources/views/functions/email.blade.phpd的邮件激活链接成你的域名
