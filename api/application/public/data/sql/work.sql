-- ----------------------------
-- Table structure for w_work
-- ----------------------------
DROP TABLE IF EXISTS `w_work`;
CREATE TABLE `w_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date_index` int(11) NOT NULL DEFAULT '0' COMMENT '日期索引',
  `has_late` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常,其他表示当日迟到次数',
  `has_leave_early` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常,1表示当日早退次数',
  `has_absenteeism` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常，1表示旷工',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='考勤记录主表，每人每天最多一条记录';

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

-- ----------------------------
-- Table structure for w_work_record
-- ----------------------------
DROP TABLE IF EXISTS `w_work_record`;
CREATE TABLE `w_work_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '打卡用户id',
  `work_id` int(11) NOT NULL DEFAULT '0' COMMENT '记录所属主打卡记录',
  `time_index` int(11) NOT NULL DEFAULT '0' COMMENT '时间索引通过打卡时间段计算出的唯一数字串，用于快速区分是哪个打卡时段的记录，不限时段签卡时此字段恒为0',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录创建时间',
  `device_number` varchar(10) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '设备号',
  `lng` decimal(20,16) NOT NULL,
  `lat` decimal(20,16) NOT NULL DEFAULT '0.0000000000000000' COMMENT '纬度',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '打卡地址',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1上班打卡,2下班打卡，3不限时段打卡',
  `is_late` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常，1迟到',
  `is_leave_early` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常,1早退',
  `is_absenteeism` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0正常,1旷工',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='打卡记录表，如果按时段打卡每个时段一条记录，如果是自由签卡每条记录最小间隔5分钟';

-- ----------------------------
-- Table structure for w_work_template
-- ----------------------------
DROP TABLE IF EXISTS `w_work_template`;
CREATE TABLE `w_work_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL DEFAULT '0' COMMENT '模板所属公司',
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '模板名称',
  `week_config` char(43) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '按周配置,json格式如:{"1":1,"2":1,"3":1,"4":1,"5":1,"6":0,"7":0}\r\n',
  `date_config` text COLLATE utf8_unicode_ci COMMENT '按日期排班注释,json格式，如:[1,2,3,23,25]',
  `skip_holidays` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0严格按设置执行,1自动跳过节假日',
  `ip_config` text COLLATE utf8_unicode_ci COMMENT '允许的ip列表,json格式，如:["127.0.0.1","192.68.56.1"]',
  `address_config` text COLLATE utf8_unicode_ci COMMENT '允许打卡的地点列表,json格式如:[{"address":"甘肃省兰州市西北民族大学榆中校区","lng":134.55,"lat":34.66},{"address":"甘肃省兰州市西北民族大学本部","lng":134.55,"lat":34.66}]',
  `shake_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '摇一摇打卡回调地址',
  `delete_time` int(11) DEFAULT '0' COMMENT '删除时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `range_config` text COLLATE utf8_unicode_ci COMMENT '模板适用范围配置，此字段只作为临时存储，以应对后期功能扩展以及变更,模板最终会被对应到单个成员,json格式如{"departments":[1,2,3],"include_users":[1234,223],"exclude_users":[111,2212]},适用的部门id，额外适用的成员id，额外排除的成员id',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '模板生效时间,默认在设置次日生效',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '模板截止使用时间,0表示长期有效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='模板记录表';
