<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:24 AM
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

    <link href="assets/Main/css/pages/login.css" rel="stylesheet" />


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

            <a class="brand" href="./">公共自行车预约管理系统</a>

            <div class="nav-collapse">

                <ul class="nav pull-right">

                    <li class="">

                        <a href="javascript:;"><!--<i class="icon-chevron-left">--></i></a>
                    </li>
                </ul>

            </div> <!-- /nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->


<div id="login-container">


    <div id="login-header">

        <h3>管理员登录</h3>

    </div> <!-- /login-header -->

    <div id="login-content" class="clearfix">

        <form action="index.php/adminLogin" method="post" />
        <fieldset>
            <div class="control-group">
                <?php echo validation_errors('<label style="color: red">', '</label>');?>
            </div>
            <div class="control-group">
                <label class="control-label" for="username">用户名</label>
                <div class="controls">
                    <input type="text" class="" id="username" name="adminId" value="<?php echo set_value('adminId');?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">密码</label>
                <div class="controls">
                    <input type="password" class="" id="password" name="password" value="<?php echo set_value('password');?>"/>
                </div>
            </div>
        </fieldset>

        <div id="remember-me" class="pull-left">
            <input type="checkbox" name="remember" id="remember" />
            <label id="remember-label" for="remember">记住密码</label>
        </div>

        <div class="pull-right">
            <button type="submit" class="btn btn-warning btn-large">
                登录
            </button>
        </div>
        </form>

    </div> <!-- /login-content -->


    <!--<div id="login-extra">

        <p>还没有账号? <a href="javascript:;">马上注册.</a></p>

        <p>忘记密码? <a href="forgot_password.html">发送邮件.</a></p>

    </div>--> <!-- /login-extra -->

</div> <!-- /login-wrapper -->



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/Main/js/jquery.min.js"></script>


<script src="assets/Main/js/bootstrap.js"></script>
</body>
</html>