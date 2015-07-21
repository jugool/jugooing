-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '唯一id,主键',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `job_number` tinyint(6) COLLATE utf8_unicode_ci NOT NULL COMMENT '工号',
  `depart_number` tinyint(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '部门编号',
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `telephone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机',
  `image` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像地址',
  `type` tinyint(2) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户类型',
  PRIMARY KEY (`id`),
  KEY `index_job_number` (`name`),
  KEY `index_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;