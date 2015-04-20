<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:22 AM
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url() ?>" />
    <meta charset="utf-8" />
    <title>欢迎您使用公共自行车预约管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <link href="assets/Main/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/Main/css/bootstrap-responsive.min.css" rel="stylesheet" />

    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />-->
    <link href="assets/Main/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/Main/css/adminia.css" rel="stylesheet" />
    <link href="assets/Main/css/adminia-responsive.css" rel="stylesheet" />

    <link href="assets/Main/css/pages/dashboard.css" rel="stylesheet" />
    <link href="assets/Main/css/pages/faq.css" rel="stylesheet" />


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>


<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="index.php/adminHref/gotoAdminMainPage">公共自行车预约管理系统</a>

            <div class="nav-collapse">

                <ul class="nav pull-right">
                    <!--
                    <li>
                        <a href="#"><span class="badge badge-warning">7</span></a>
                    </li>
                    -->

                    <li class="divider-vertical"></li>

                    <li class="dropdown">

                        <a data-toggle="dropdown" class="dropdown-toggle " href="#">
                            <?php echo $admin[0]->name?> <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php/adminHref/gotoAdminInfor"><i class="icon-user"></i> 账户信息  </a>
                            </li>

                            <!--
                            <li>
                                <a href="./change_password.html"><i class="icon-lock"></i> 修改密码</a>
                            </li>
                            -->

                            <li class="divider"></li>

                            <li>
                                <a href="index.php/adminLogin/logout"><i class="icon-off"></i> 退出</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div> <!-- /nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->




<div id="content">

    <div class="container">

        <div class="row">

            <div class="span3">

                <div class="account-container">

                    <div class="account-avatar">
                        <img src="assets/admin.png" alt="" class="thumbnail" />
                    </div> <!-- /account-avatar -->

                    <div class="account-details">

                        <span class="account-name"><?php echo $admin[0]->name ?></span>

                        <span class="account-role">管理员</span>

						<span class="account-actions">
							<a href="index.php/adminHref/gotoAdminInfor">资料</a>

							<!--<a href="javascript:;">编辑设置</a>-->
						</span>

                    </div> <!-- /account-details -->

                </div> <!-- /account-container -->

                <hr />

                <ul id="main-nav" class="nav nav-tabs nav-stacked">

                    <li <?php echo $activeArr[0]?>>
                        <a href="index.php/adminHref/gotoAdminMainPage">
                            <i class="icon-home"></i>
                            首页
                        </a>
                    </li>

                    <li  <?php echo $activeArr[1]?>>
                        <a href="index.php/adminHref/gotoAdminReservationOrder">
                            <i class="icon-th-list"></i>
                            未完成预约订单
                        </a>
                    </li>

                    <li <?php echo $activeArr[2]?>>
                        <a href="index.php/adminHref/gotoAdminRentOrder">
                            <i class="icon-th-list"></i>
                            未完成租车订单
                        </a>
                    </li>

                    <li <?php echo $activeArr[3]?>>
                        <a href="index.php/adminHref/gotoAdminCreateRentOrder">
                            <i class="icon-th-large"></i>
                            创建租车订单
                        </a>
                    </li>

                    <li <?php echo $activeArr[4]?>>
                        <a href="index.php/adminHref/gotoAdminAccountManage">
                            <i class="icon-star"></i>
                            用户帐户管理
                        </a>
                    </li>
                    <?php if($admin[0]->privilege >= 3){?>
                    <li  <?php echo $activeArr[5]?>>
                        <a href="index.php/adminHref/gotoAdminSystemMaintain">
                            <i class="icon-comments"></i>
                            系统维护
                        </a>
                    </li>
                    <?php }?>
                    <?php if($admin[0]->privilege >= 3){?>
                    <li <?php echo $activeArr[6]?>>
                        <a href="index.php/adminHref/gotoAdminAccountSearch">
                            <i class="icon-search"></i>
                            帐户查询
                        </a>
                    </li>
                    <?php }?>
                    <?php if($admin[0]->privilege >= 2){?>
                    <li <?php echo $activeArr[7]?>>
                        <a href="index.php/adminHref/gotoAdminHistoricalOrder">
                            <i class="icon-bookmark"></i>
                            全部订单
                        </a>
                    </li>
                    <?php }?>
                    <li  <?php echo $activeArr[8]?>>
                        <a href="index.php/adminHref/gotoAdminInfor">
                            <i class="icon-user"></i>
                            帐户信息
                        </a>
                    </li>

                    <li>
                        <a href="index.php/adminLogin/logout">
                            <i class="icon-lock"></i>
                            登录页面
                        </a>
                    </li>

                </ul>

                <hr />

                <div class="sidebar-extra">
                    <p>欢迎使用公共自行车管理系统.
                        <br><?php echo "今天是 ".date('Y-m-d',time()); ?>
                        <br>如果问题请联系: helloworld@gmail.com</p>
                </div> <!-- .sidebar-extra -->

                <br />

            </div> <!-- /span3 -->