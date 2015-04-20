<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/13/15
 * Time: 2:59 PM
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
<h1 class="margin-bottom-15">注册新的用户</h1>
<div class="container">
    <div class="col-md-12">
        <form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="<?php echo base_url()?>index.php/customerRegiste" method="post">
            <div class="form-inner">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="customerId" class="control-label">用户名&emsp;&emsp;<?php echo form_error('customerId','<label style="color: red">', '</label>'); ?></label>
                        <input type="text" class="form-control" id="customerId" name="customerId" value="<?php echo set_value('customerId');?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="name" class="control-label">姓名&emsp;&emsp;<?php echo form_error('name','<label style="color: red">', '</label>'); ?></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name');?>" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="birthDate" class="control-label">出生日期&emsp;&emsp;<?php echo form_error('birthDate','<label style="color: red">', '</label>'); ?></label>
                        <div id="datetimepicker" class="input-append date">
                            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo set_value('birthDate');?>">
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="citizenId" class="control-label">身份证号&emsp;&emsp;<?php echo form_error('citizenId','<label style="color: red">', '</label>'); ?></label>
                        <input type="text" class="form-control" id="citizenId" name="citizenId" value="<?php echo set_value('citizenId');?>" placeholder="">
                    </div>
                    <div class="col-md-6 templatemo-radio-group">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="genderM" value="1"> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="genderF" value="0"> 女
                        </label>
                        &emsp;&emsp;<label style="color: red"><?php echo form_error('gender'); ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="password" class="control-label">密码&emsp;&emsp;<?php echo form_error('password','<label style="color: red">', '</label>'); ?></label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password');?>" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="control-label">确认密码&emsp;&emsp;<?php echo form_error('password_confirm','<label style="color: red">', '</label>'); ?></label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" value="<?php echo set_value('password');?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label><input type="checkbox" id="agree" name="agree"">同意 <a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">服务条款</a> 和 <a href="#">隐私条例</a></label>
                        &emsp;&emsp;<?php echo form_error('agree','<label style="color: red">', '</label>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" value="注册" class="btn btn-info">
                        <a href="<?php echo base_url()?>index.php/customerRegiste/gotoCustomerLogin" class="pull-right">登陆</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">服务条款</h4>
            </div>
            <div class="modal-body">
                <p><em><b>自行车用户系统使用须知：</b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请您在使用本系统前仔细阅读如下条款。包括免除或者限制作者责任的免责条款及对用户的权利限制。您的使用行为将视为对本《协议》的接受，并同意接受本《协议》各项条款的约束。
                    本《用户许可协议》（以下称《协议》）是您（个人或单一机构团体）与自行车预约系统平台之间的法律协议。在您使用本系统平台之前,请务必阅读此《协议》，任何与《协议》有关的软件、电子文档等都应是按本协议的条款而授予您的，同时本《协议》亦适用于任何有关本软件产品的后期发行和升级。您一旦安装、复制、下裁、访问或以其它方式使用本软件产品，即表示您同意接受本《协议》各项条款的约束。如果您拒绝接受本《协议》条款，请您停止使用本系统平台及其相关服务。<br>
                    <br>
                    <em><b>一、自行车用户系统使用须知：</b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. 只有在本系统下完成实名注册后，才能在各个自行车停放处预定自行车和车位；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.每个完成实名注册的账号仅能够预定一个自行车和车位；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.自行车和车位的预定时间均为30分钟，逾期未借者将会作为一次违规记录在案；违约次数过多将会冻结账号一定时间。（可交罚款解冻）；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.本自行车预定系统仅支持本市所有的自行车停放处的预约；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. 自行车租借后必须保证自行车的完好，若有损坏，请如实陈述缘由并按原价赔偿；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.本自行车预约系统在每个自行车停放处均有安装，每位注册成员可自行登录自己账号或到停放处查询自己的预约详细情况；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.请从租借自行车时间开始计时的2小时内将自行车归还到附近的自行车停放处；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. 本自行车预约系统及公用自行车的租用均为免费；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.未注册成员将无法享用网上提前预定的功能，但可以到自行车停放点人工进行自行车的租借；<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.自行车停放处会定期检查自行车的状况，保证自行车的完好性；请租借自行车后，遵守交通规则，如若出现交通事故，概不负责。<br>
                    <br>
                    <em><b>二、许可证的授予。本《协议》授予您下列权利：</b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安装和使用： 您可安装无限制数量的本软件产品来使用。 复制、分发和传播：
                    您可以复制、分发和传播无限制数量的软件产品，但您必须保证每一份复制、分发和传播都必须是完整和真实的，包括所有有关本软件产品的软件、电子文档，版权和商标宣言，亦包括本协议。

                    <br><br>
                    <em><b>三、其它权利和限制说明。</b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;付费注册版本： 个人使用授权版本只能由单个用户在一台或多台计算机上亲自使用；
                    公司使用授权版本允许公司内部员工在固定场所使用。 禁止反向工程、反向编译和反向汇编：
                    您不得对本软件产品进行反向工程、反向编译和反向汇编，不得删除本软件及其他副本上一切关于版权的信息，不得制作和提供该软件的注册机及破解程序。除非适用法律明文允许上述活动，否则您必须遵守此协议限制。
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;组件的分隔： 本软件产品是被当成一个单一产品而被授予许可使用，不得将各个部分分开用于任何目的行动。 保证： 本软件版权人
                    公共自行车预约系统
                    特此申明对本软件产品之使用不提供任何保证。版权人将不对任何用户保证本软件产品的适用性，不保证无故障产生；亦不对任何用户使用此软件所遭遇到的任何理论上的或实际上的损失承担负责。
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;终止：
                    如您未遵守本《协议》的各项条件，在不损害其它权利的情况下，版权人可将本《协议》终止。如发生此种情况，则您必须销毁“软件产品”及其各部分的所有副本。
                    <br><br>
                    <em><b>四、作者特别授权</b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本软件为共享软件，版权归作者所有。欢迎各用户试用。各有关单位及个人在保证不修改本系统任何程序及文档的前提下，本系统的作者特授权如下：<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1、各报社、杂志社、出版发行商可将本软件收录进其发行的各种光盘中供试用。<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、各计算机生产商、销售商可将本软件安装在其生产或销售的计算机中，供其客户试用。<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、任何人不得修改本软件，也不得将被修改过的软件收录进光盘、磁盘、主页等媒介中或安装在计算机中。更不得进行非法解密或注册的任何活动，否则本作者将保留依法追纠的权利。<br>
                    <br>
                    <em><b>五、免责声明： </b></em><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本软件并无附带任何形式的明示的或暗示的保证，包括任何关于本软件的适用性, 无侵犯知识产权或适合作某一特定用途的保证。
                    在任何情况下，对于因使用本软件或无法使用本软件而导致的任何损害赔偿，作者均无须承担法律责任,
                    即使作者曾经被告知有可能出现该等损害赔偿。作者不保证本软件所包含的资料,文字、图形、链接或其它事项的准确性或完整性。作者可随时更改本软件，无须另作通知。
                    此外，出于某些原因，本软件现在只提供信息显示界面，所有由用户自己制作、下载、使用的第三方信息数据插件所引起的一切版权问题或纠纷，本软件概不承担任何责任，也不提供任何明确的或暗示的保证。</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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