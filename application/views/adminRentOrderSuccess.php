<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 5:12 PM
 */
?>


<div class="span9">

    <h1 class="page-title">
        <i class="icon-th-large"></i>
        完成租车订单
    </h1>

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-check"></i>
                    <h3 style="color: green">租车订单已完成</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>订单编号</td>
                            <td><?php echo $bike_rent[0]->id?></td>
                        </tr>
                        <tr>
                            <td>帐户名称</td>
                            <td><?php echo $bike_rent[0]->customer_id?></td>
                        </tr>
                        <tr>
                            <td>客户姓名</td>
                            <td><?php echo $customer[0]->name?></td>
                        </tr>
                        <tr>
                            <td>租车服务站</td>
                            <td><?php echo $rent_station[0]->station_name?></td>
                        </tr>
                        <tr>
                            <td>租车时间</td>
                            <td><?php echo $bike_rent[0]->start_time?></td>
                        </tr>
                        <tr>
                            <td>归还服务站</td>
                            <td><?php echo $return_station[0]->station_name?></td>
                        </tr>
                        <tr>
                            <td>租车时长</td>
                            <td style="color: orange"><?php echo $last."min"?></td>
                        </tr>
                        <tr>
                            <td>归还时间</td>
                            <td><?php echo $bike_rent[0]->finish_time?></td>
                        </tr>
                        <tr>
                            <td>租车费用</td>
                            <td style="color: red"><?php echo "￥".$bike_rent[0]->cost?></td>
                        </tr>
                        <tr>
                            <td>操作员</td>
                            <td><?php echo $bike_rent[0]->operate_by?></td>
                        </tr>

                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-pencil"></i>
                    <h3 style="color: orange">帐户余额信息</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>帐户名称</td>
                            <td><?php echo $bike_rent[0]->customer_id?></td>
                        </tr>
                        <tr>
                            <td>客户姓名</td>
                            <td><?php echo $customer[0]->name?></td>
                        </tr>
                        <tr>
                            <td>帐户余额</td>
                            <?php if($customer[0]->balance < 0){echo "<td style=\"color: red\">￥".$customer[0]->balance."</td>";}
                            else{echo "<td style=\"color: green\">￥".$customer[0]->balance."</td>";}?>
                        </tr>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

</div> <!-- /span9 -->

</div>
<!-- /row -->
</div>
<!-- /container -->

</div>
<!-- /content -->