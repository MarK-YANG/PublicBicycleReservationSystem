##公共自行车预约服务系统
----

###1.项目介绍

----

目前公共自行车越来越受到欢迎,但是其中的问题还是很多的,比如 自行车难以管理,有些自行车服务站无人借车但是有些却极为抢手无车可借,同时有些服务站没有空余的还车位,很不方便。本系统为则基于以上的问题，提供在线的**自行车**，**自行车位**预约的服务。


###2.系统配置

---

1. 服务器：`MySQL`
2. 用户客户端：
	* `IOS客户端`
	* `Android客户端`
3. 用户网页客户端：`Chrome`，`FireFox`等浏览器
4. 管理网网页客户端： `Chrome`，`FireFox`等浏览器
5. 编程语言的选择：
	* 系统的功能实现：`JavaEE(with SSH Framework)`
	* 用户客户端：
		* IOS客户端：`Objective-C IOS 编程`
		* Android客户端： `Java Android 编程`
	* 网页客户端：`PHP编程`
	

###3.用例设计

-----


1. 用户的 _登陆_ 与 _注册_
	* 登陆：用户通过输入用户名和密码登入本系统，若用户名与密码不匹配，则显示错误提示`用户名密码不匹配，请您检查后重新输入`
	* 注册：用户进入注册界面，按照提示要求输入所应输入必要的身份信息。如，`用户名（邮箱）`，`密码`，`确认密码`，`身份证号码`，`出生日期`，`真实姓名`，`性别`，等有效的身份信息。

2. 管理员的 _登陆_ 与 _注册_
	* 登陆： 管理员通过管理员登陆界面输入用户名和密码登入本系统，若用户名与密码不匹配，则显示错误提示`用户名密码不匹配，请您检查后重新输入`
	* 注册： 管理员的注册需要通过`有注册权限的管理员`来注册，在高权限的管理员管理界面下，有注册新的管理员功能卡。

3. 