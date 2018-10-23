<<<<<<< HEAD
﻿###环境 PHP >= 7.1.3
=======
###环境
PHP >= 7.1.3
>>>>>>> 78604764bfd47d7d814ae4f558cfaedaa25af512

OpenSSL PHP

PHP PDO 扩展

PHP Mbstring 扩展

PHP Tokenizer 扩展

PHP XML 扩展

PHP Ctype 扩展

PHP JSON 扩展

<<<<<<< HEAD
###配置 ####1.创建相应的表
=======
###配置
####1.创建相应的表
>>>>>>> 78604764bfd47d7d814ae4f558cfaedaa25af512

#####1）que_column栏目表

CREATE TABLE que_column (

id int(10) unsigned NOT NULL AUTO_INCREMENT,

name varchar(255) NOT NULL,

cname varchar(255) NOT NULL,

questions int(11) NOT NULL,

sid int(11) NOT NULL COMMENT '上级目录id',

top int(11) NOT NULL COMMENT '是否顶级目录0是1否',

PRIMARY KEY (id)

) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#####2）que_content内容表

CREATE TABLE que_content (

<<<<<<< HEAD
id int(10) unsigned NOT NULL AUTO_INCREMENT,
=======
#####2）que_content内容表
>>>>>>> 78604764bfd47d7d814ae4f558cfaedaa25af512

content text,

PRIMARY KEY (id)

) ENGINE=InnoDB AUTO_INCREMENT=2751 DEFAULT CHARSET=utf8;

#####3）que_question问答表

CREATE TABLE que_question (

<<<<<<< HEAD
id int(10) unsigned NOT NULL AUTO_INCREMENT,
=======
#####3）que_question问答表

CREATE TABLE `que_question` (
>>>>>>> 78604764bfd47d7d814ae4f558cfaedaa25af512

cnid int(10) DEFAULT NULL,

cid int(10) DEFAULT NULL,

title varchar(90) DEFAULT NULL,

describes varchar(255) DEFAULT NULL,

keyword varchar(30) DEFAULT NULL,

created_at datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

updated_at datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

PRIMARY KEY (id)

) ENGINE=InnoDB AUTO_INCREMENT=2746 DEFAULT CHARSET=utf8;

<<<<<<< HEAD
####2.修改.env里面的数据库配置信息
=======
####2.修改.env里面的数据库配置信息

>>>>>>> 78604764bfd47d7d814ae4f558cfaedaa25af512
