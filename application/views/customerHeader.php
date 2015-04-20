<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/24/15
 * Time: 10:52 AM
 */
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8" />
    <base href="<?php echo base_url() ?>" />
    <title>欢迎使用公共自行车预约管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <link href="assets/Main/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/Main/css/bootstrap-responsive.min.css" rel="stylesheet" />

    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />-->
    <link href="assets/Main/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/Main/css/adminia.css" rel="stylesheet" />
    <link href="assets/Main/css/adminia-responsive.css" rel="stylesheet" />

    <link href="assets/Main/css/pages/dashboard.css" rel="stylesheet" />


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

            <a class="brand" href="index.php/customerHref/gotoCustomerMainPage">公共自行车预约服务系统</a>

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
                            <?php echo $customer[0]->name?> <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php/customerHref/gotoCustomerMainPage"><i class="icon-user"></i> 账号信息  </a>
                            </li>

                            <!--

                            <li>
                                <a href="./change_password.html"><i class="icon-lock"></i> 修改密码</a>
                            </li>

                            -->

                            <li class="divider"></li>

                            <li>
                                <a href="index.php/customerMainPage/logout"><i class="icon-off"></i> 退出</a>
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
                        <img src="assets/customer.jpg" alt="" class="thumbnail" />
                    </div> <!-- /account-avatar -->

                    <div class="account-details">

                        <span class="account-name"><?php echo $customer[0]->name?></span>

                        <span class="account-role">客户</span>

						<span class="account-actions">
							<a href="index.php/customerHref/gotoCustomerMainPage">资料</a> |

							<a href="javascript:;">历史订单</a>
						</span>

                    </div> <!-- /account-details -->

                </div> <!-- /account-container -->

                <hr />

                <ul id="main-nav" class="nav nav-tabs nav-stacked">

                    <li <?php echo $activeArr[0]?>>
                        <a href="index.php/customerHref/gotoCustomerMainPage">
                            <i class="icon-user"></i>
                            用户帐户
                        </a>
                    </li>

                    <li <?php echo $activeArr[1]?>>
                        <a href="index.php/customerHref/gotoCustomerStationPage">
                            <i class="icon-th-list"></i>
                            服务站状况总览
                        </a>
                    </li>

                    <li <?php echo $activeArr[2]?>>
                        <a href="index.php/customerHref/gotoCustomerBikeBook">
                            <i class="icon-th-large"></i>
                            预约公共自行车
                        </a>
                    </li>

                    <li <?php echo $activeArr[3]?>>
                        <a href="index.php/customerHref/gotoCustomerParkingspaceBook">
                            <i class="icon-pushpin"></i>
                            预约公共自行车停车位
                            <!--<span class="label label-warning pull-right">5</span>-->
                        </a>
                    </li>

                    <li <?php echo $activeArr[4]?>>
                        <a href="index.php/customerHref/gotoCustomerUnfinishedOrder">
                            <i class="icon-time"></i>
                            未完成订单
                        </a>
                    </li>

                    <li <?php echo $activeArr[5]?>>
                        <a href="index.php/customerHref/gotoCustomerHistoricalOrder">
                            <i class="icon-book"></i>
                            历史订单
                        </a>
                    </li>

                </ul>

                <hr />

                <div class="sidebar-extra">
                    <p>欢迎使用公共自行车服务系统.
                        <br><?php echo "今天是 ".date('Y-m-d',time()); ?>
                        <br>如果问题请联系: helloworld@gmail.com</p>
                </div> <!-- .sidebar-extra -->

                <br />

            </div> <!-- /span3 -->