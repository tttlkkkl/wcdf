/*
Navicat MySQL Data Transfer

Source Server         : 192.168.56.1
Source Server Version : 50550
Source Host           : 192.168.56.1:3307
Source Database       : wcdf

Target Server Type    : MYSQL
Target Server Version : 50550
File Encoding         : 65001

Date: 2017-05-04 17:01:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w_department
-- ----------------------------
DROP TABLE IF EXISTS `w_department`;
CREATE TABLE `w_department` (
  `pk` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键与微信或企业微信保持一致',
  `id` int(11) NOT NULL DEFAULT '1' COMMENT '部门id，与微信对应',
  `c_id` int(11) NOT NULL COMMENT '企业标识',
  `name` char(32) NOT NULL COMMENT '部门名称',
  `parentid` int(11) NOT NULL DEFAULT '0' COMMENT '父部门id',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '值越小越靠前',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT '节点左值,实际从１开始',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT '节点右值，实际从１开始',
  `depth` int(11) NOT NULL DEFAULT '0' COMMENT '节点深度,１为根',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '建立时间戳',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '标记删除，并记录删除时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`pk`),
  UNIQUE KEY `id_c_id` (`id`,`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部门信息表';

-- ----------------------------
-- Table structure for w_member
-- ----------------------------
DROP TABLE IF EXISTS `w_member`;
CREATE TABLE `w_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL DEFAULT '0' COMMENT 'company_id 缩写，平台性账号标识',
  `name` varchar(64) NOT NULL COMMENT '用户名',
  `userid` char(64) NOT NULL COMMENT '用户账号',
  `position` varchar(64) DEFAULT '' COMMENT '职位',
  `mobile` char(11) DEFAULT '' COMMENT '手机号',
  `gender` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别，０未知，１男，２女',
  `email` varchar(64) DEFAULT '' COMMENT '邮箱',
  `weixinid` char(32) DEFAULT '' COMMENT '微信号，不是微信名称',
  `avatar` varchar(128) DEFAULT '' COMMENT '用户头像路径，标准长度为１１８个字符',
  `extattr` text COMMENT '用户扩展属性',
  `status` tinyint(4) DEFAULT NULL COMMENT '1已关注，２已冻结，４未关注',
  `is_leader` tinyint(4) DEFAULT '0' COMMENT '１领导，企业微信专有字段',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '建立时的间戳',
  `delete_time` int(11) NOT NULL DEFAULT '0' COMMENT '标记删除，并记录删除时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `c_id_userid` (`c_id`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='成员信息表';

-- ----------------------------
-- Table structure for w_work_member_template
-- ----------------------------
DROP TABLE IF EXISTS `w_work_member_template`;
CREATE TABLE `w_work_member_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL DEFAULT '0' COMMENT '企业id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `tpl_id` int(11) NOT NULL DEFAULT '0' COMMENT '模板id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='成员与考勤模板关联表,一对一关联,即一个用户只能有一个模板';
