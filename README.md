本项目旨在搭建一个供微信企业号和企业微信的敏捷开发的后端服务框架。
本项目根据将近２年的企业号开发经验进行规划编码，将实现所有微信常用接口，包括成员、部门、标签、消息，应用授权，OAuth2.0、应用菜单，文件、支付等功能。但是不会实现第三方授权接口。

项目系统需求:

> linux CentOS ubuntu

> nginx >=1.4.7以上版本

> PHP >= 5.5

> swoole 1.8.x

> yaf >=2.3.4 如果是PHP7建议使用最新yaf版本3.0.4

> SeasLog>=1.6.2

> redis 3.0.3

> mariaDB 10.1.17



### 编码规范
> * 在与yaf自身规则不冲突的情况下都应该遵守PSR编码规范。
> * 所有错误都应该通过`throw new \Exception();`来抛出。
> * 错误码:发生错误时应该区分错误等级,错误码由‘1个错误等级标识符(和微信5位码作区别)’＋＇３个错误码’,标识符从1到8分别对应SeasLog的８个日志等级(debug,info,notice,warning,error,critical,alert,emergency)。如8456是一个emergency级别的错误。
> * 日志：虽然可以在错误控制器中分别打印错误日志，但是日志无法记录一些现场关键信息，所以应该按照业务需求在代码中打印日志，以配合SeasLog进行健康预警和分析。
> * 应该按功能划分模块，模块应至少具备３个控制器，Index控制器：后台管理端实现，进行页面渲染并做一些控制和跳转。Api控制器：提供模块可调用的api。Error控制器：集中的错误处理。
> * 接口返回：默认以json格式返回数据,{"code":0,"msg":"success","data":"data"},code为０时标示成功，数据项在data中，否则code为错误码，msg为错误信息。所有api接口返回结果可以用packing()函数打包；
> * 所有接口都应该标明请求参数，和其他必要说明。如果有源码贡献应该编写一个以模块名或组件名为名称的wiki文档页。
> * 控制器中不应该写太多的业务代码，仅作为一个访问入口。为了方便扩展和公共控制，预置Api,Web,Error三个控制器，所有提供api接口的控制器都应该继承system\controllers\Api,所有提供web页面访问的都应该继承system\controllers\Web,所有错误控制器都应该继承system\controllers\Error。

###其他
> ####见 [wiki](https://git.oschina.net/tttlkkkl/wcdf/wikis/home)
