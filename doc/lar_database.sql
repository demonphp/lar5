-- 文章分类表
CREATE TABLE IF NOT EXISTS `l_blog_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类的名称',
  `title` varchar(255)  NOT NULL DEFAULT '' COMMENT '标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `view` int(11) NOT NULL DEFAULT 0 COMMENT '查看次数',
  `order` tinyint(11) NOT NULL DEFAULT 0 COMMENT '排序,值越大越前',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '父级分类的id,默认为0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类表' AUTO_INCREMENT=1 ;

-- 蠕虫复制
insert into l_blog_cate (`name`,`title`,`keywords`,`description`,`view`,`order`,`pid`,`created_at`,`updated_at`) select `name`,`title`,`keywords`,`description`,`view`,`order`,`pid`,`created_at`,`updated_at` from l_blog_cate;

