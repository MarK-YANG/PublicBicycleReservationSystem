<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 8:30 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-search"></i>
        帐户查询
    </h1>

    <div class="widget">

        <div class="widget-header">
            <i class="icon-check"></i>
            <h3 style="color: green">查询结果</h3>
        </div>

        <div class="widget-content">

            <table class="table table-striped table-bordered">

                <tbody>
                <tr>
                    <td>帐号名称</td>
                    <td><?php echo $customer[0]->customer_id?></td>
                </tr>
                <tr>
                    <td>客户姓名</td>
                    <td><?php echo $customer[0]->name?></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td><?php if($customer[0]->gender){echo "男";}else{echo "女";}?></td>
                </tr>
                <tr>
                    <td>身份证号码</td>
                    <td><?php echo $customer[0]->citizen_id?></td>
                </tr>
                <tr>
                    <td>出生日期</td>
                    <td><?php echo $customer[0]->birthdate?></td>
                </tr>
                <tr>
                    <td>创建时间</td>
                    <td><?php echo $customer[0]->create_time?></td>
                </tr>
                <tr>
                    <td>帐户余额</td>
                    <td>￥ <?php echo number_format($customer[0]->balance, 2)?></td>
                </tr>
                <tr>
                    <td>违约次数</td>
                    <td><?php echo $customer[0]->break_count?></td>
                </tr>
                <tr>
                    <td>用户等级</td>
                    <td>VIP<?php echo $customer[0]->level?></td>
                </tr>
                </tbody>
            </table>

        </div>
        <!-- /widget-content -->

    </div> <!-- /widget -->


</div> <!-- /container -->

</div> <!-- /content -->