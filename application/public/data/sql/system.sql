-- 系统整体相关数据库表　ｂｙ　李华
-- 企业，账号信息表
DROP TABLE IF EXISTS w_company;
CREATE TABLE w_company(
    `id` INT (11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR (50) NOT NULL comment'企业名称',
    `corpid` char(32),
    `corpsecret` VARCHAR (128) comment'管理组权限凭据,新建管理组后可见',
    `create_time` INT(11) NOT NULL DEFAULT 0 comment'建立时间戳',
    `update_time` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE index corpid (`corpid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO w_company(id,name,corpid,corpsecret,create_time,update_time)
VALUES (1,'AK47战队','wx4fa7d40737be7934','smZfzJCzqgJCMwbUiFHaBMVllUwLsJYU0XDTN9VbNjYA4PlBX-j2fkQoUiWFx0Ar',unix_timestamp(now()),now());
