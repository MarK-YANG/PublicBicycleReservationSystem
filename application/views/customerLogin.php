<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/16/15
 * Time: 4:41 PM
 */
?>

<!DOCTYPE html>
<head>
    <base href="<?php echo base_url() ?>" />
    <title>公共自行车预约服务系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/customer/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/customer/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/customer/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="assets/customer/css/templatemo_style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/customer/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/customer/css/bootstrap-datetimepicker.min.css" media="screen" rel="stylesheet" type="text/css">

</head>

<body class="templatemo-bg-gray">
<div class="container">
    <div class="col-md-12">
        <h1 class="margin-bottom-15">欢迎使用公共自行车预约服务系统</h1>
        <br>
        <form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo base_url() ?>index.php/CustomerLogin/login" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <?php echo validation_errors('<label style="color: red" class="control-label">', '</label>');?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="control-wrapper">
                        <label for="customerId" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
                        <input type="text" class="form-control" id="customerId" name="customerId" placeholder="用户名" value="<?php echo set_value('customerId');?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="密码" value="<?php echo set_value('password');?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox control-wrapper">
                        <label>
                            <input type="checkbox"> 记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <input type="submit" value="登陆" class="btn btn-info">
                        <a href="forgot-password.html" class="text-right pull-right">忘记密码?</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-12">
                    <label>Login with: </label>
                    <div class="inline-block">
                        <a href="#"><i class="fa fa-facebook-square login-with"></i></a>
                        <a href="#"><i class="fa fa-twitter-square login-with"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square login-with"></i></a>
                        <a href="#"><i class="fa fa-tumblr-square login-with"></i></a>
                        <a href="#"><i class="fa fa-github-square login-with"></i></a>
                    </div>
                </div>
            </div>
        </form>
        <div class="text-center">
            <a href="<?php echo base_url()?>index.php/customerLogin/gotoCustomerRegiste" class="templatemo-create-new">注册一个新的用户<i class="fa fa-arrow-circle-o-right"></i></a>
        </div>
    </div>
</div>


<script type="text/javascript" src="assets/customer/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/customer/js/bootstrap.min.js"></script>
<script src="assets/customer/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'en',
        pickDate: true,
        pickTime: false,
        hourStep: 1,
        minuteStep: 15,
        secondStep: 30,
        inputMask: true
    });
</script>


</body>
</html>
