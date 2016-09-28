-- 员工表源文件　ｂｙ李华

-- 员工表依照腾讯接口规范和实际使用经验建立
DROP TABLE IF EXISTS `w_member`;
CREATE TABLE `w_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` INT(11) NOT NULL DEFAULT 0 comment'company_id 缩写，平台性账号标识',
  `name` VARCHAR (64) NOT NULL comment'用户名',
  `userid` CHAR(32) NOT NULL comment'用户账号',
  `position` VARCHAR (64) DEFAULT '' comment'职位',
  `mobile` char(11) DEFAULT '' comment'手机号',
  `gender` tinyint(4) NOT NULL DEFAULT 0 comment'性别，０未知，１男，２女',
  `email` VARCHAR(64) DEFAULT '' comment'邮箱',
  `weixinid` CHAR(32) DEFAULT '' comment'微信号，不是微信名称',
  `avatar` VARCHAR(128) DEFAULT '' comment'用户头像路径，标准长度为１１８个字符',
  `extattr` text NULL comment'用户扩展属性',
  `status` tinyint(4) comment'1已关注，２已冻结，４未关注',
  `is_leader` tinyint(4) DEFAULT 0 comment'１领导，企业微信专有字段',
  `create_time` INT(11) NOT NULL 0 comment'建立时间戳',
  `update_time` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`c_id`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 部门表
DROP TABLE IF EXISTS `w_department`;
CREATE TABLE `w_department`(
  `id` INT (11) NOT NULL AUTO_INCREMENT comment'主键与微信或企业微信保持一致',
  `c_id` INT(11) NOT NULL comment'企业标识',
  `name` CHAR (32) NOT NULL comment'部门名称',
  `parentid` int(11) NOT NULL DEFAULT 0 comment'父部门id',
  `order` int(11) NOT NULL DEFAULT 0 comment'值越小越靠前',
  `lft` INT (11) NOT NULL DEFAULT 0 comment'节点左值,实际从１开始',
  `rgt` INT(11) NOT NULL DEFAULT 0 comment'节点右值，实际从１开始',
  `depth` INT(11) NOT NULL DEFAULT 0 comment'节点深度,１为根',
  `create_time` INT(11) NOT NULL DEFAULT 0 comment'建立时间戳',
  `update_time` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`id`,`c_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
