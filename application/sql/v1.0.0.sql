DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '唯一id,主键',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `job_number` int(6) NOT NULL COMMENT '工号',
  `depart_number` tinyint(2) NOT NULL COMMENT '部门编号',
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `telephone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机',
  `qq` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ',
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像地址',
  `type` tinyint(2) NOT NULL COMMENT '用户类型',
  `create_time` int(32) DEFAULT NULL COMMENT '创建时间',
  `login_ip` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '登陆IP地址',
  `login_num` int(11) DEFAULT NULL COMMENT '登陆次数',
  PRIMARY KEY (`id`),
  KEY `index_job_number` (`job_number`),
  KEY `index_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '1', '1', 'c3284d0f94606de1fd2af172aba15bf3', '123456@qq.com', '1234567890', '123456', 'fdsavwrjtytej', '0', null, null, null);

CREATE TABLE `library` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '菜品库主键ID',
  `name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜品名称',
  `descript` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜品描述',
  `images` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '菜品图片地址',
  `price` float(5,1) DEFAULT NULL COMMENT '价格',
  `is_show` tinyint(1) DEFAULT '1' COMMENT '是否展示',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `modify_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='菜品库';

CREATE TABLE `dishes` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '菜单表主键ID',
  `l_id` int(8) DEFAULT NULL COMMENT '菜品库ID',
  `dish_day` date DEFAULT NULL COMMENT '菜品上架时间',
  `dish_time` char(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订餐时间段',
  `dish_num` tinyint(4) DEFAULT NULL COMMENT '菜品数量',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='菜单表';

CREATE TABLE `order` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单表主键ID',
  `l_id` int(8) DEFAULT NULL COMMENT '菜品ID',
  `u_id` int(8) DEFAULT NULL COMMENT '用户ID',
  `dish_day` date DEFAULT NULL COMMENT '菜品上架时间',
  `dish_time` char(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订餐时间段',
  `order_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='订单表';

ALTER TABLE `library`
MODIFY COLUMN `is_show`  tinyint(1)  NOT NULL DEFAULT 1 COMMENT '是否展示' AFTER `modify_time`;

ALTER TABLE `order`
ADD COLUMN `num`  tinyint(4) NULL DEFAULT 0 COMMENT '订餐数量' AFTER `u_id`;

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='公告表';

// 添加公告
insert into notice(content) value('暂无公告!');

ALTER TABLE `notice`
ADD COLUMN `create_time`  datetime NULL COMMENT '创建时间' AFTER `content`;
