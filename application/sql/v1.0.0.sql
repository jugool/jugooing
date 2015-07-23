DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '唯一id,主键',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `job_number` tinyint(6) NOT NULL COMMENT '工号',
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
