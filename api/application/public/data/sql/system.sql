/*
Navicat MySQL Data Transfer

Source Server         : 192.168.56.1
Source Server Version : 50550
Source Host           : 192.168.56.1:3307
Source Database       : wcdf

Target Server Type    : MYSQL
Target Server Version : 50550
File Encoding         : 65001

Date: 2017-05-04 17:01:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w_company
-- ----------------------------
DROP TABLE IF EXISTS `w_company`;
CREATE TABLE `w_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '企业名称',
  `corpid` char(32) NOT NULL DEFAULT '' COMMENT '企业在微信中的标识',
  `corpsecret` varchar(128) NOT NULL DEFAULT '' COMMENT '管理组权限凭据,新建管理组后可见',
  `founder_uid` int(11) NOT NULL DEFAULT '0' COMMENT '创始人uid',
  `founder_wx_uid` varchar(32) NOT NULL DEFAULT '' COMMENT '创始人在微信中的用户标识',
  `founder_email` varchar(128) NOT NULL DEFAULT '' COMMENT '创始人邮箱',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '建立时间戳',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `corpid` (`corpid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公司信息表';

-- ----------------------------
-- Records of w_company
-- ----------------------------
INSERT INTO `w_company` VALUES ('1', 'AK47战队', 'wx4fa7d40737be7934', 'smZfzJCzqgJCMwbUiFHaBMVllUwLsJYU0XDTN9VbNjYA4PlBX-j2fkQoUiWFx0Ar', '1', 'tttlkkkl', '3523014598@qq.com', '1493809404', '2017-05-03 19:03:24');
