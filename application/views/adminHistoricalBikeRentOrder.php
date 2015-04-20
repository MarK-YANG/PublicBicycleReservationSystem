<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 10:01 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-bookmark"></i>
        全部订单
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
                        <td>租车服务站编号</td>
                        <td><?php echo $rent_station[0]->station_id?></td>
                    </tr>
                    <tr>
                        <td>租车服务站</td>
                        <td><?php echo $rent_station[0]->station_name?></td>
                    </tr>
                    <tr>
                        <td>还车服务站编号</td>
                        <td><?php echo $return_station[0]->station_id?></td>
                    </tr>
                    <tr>
                        <td>还车服务站</td>
                        <td><?php echo $return_station[0]->station_name?></td>
                    </tr>
                    <tr>
                        <td>所租自行车编号</td>
                        <td><?php echo $bike_rent[0]->bike_id?></td>
                    </tr>
                    <tr>
                        <td>创建订单时间</td>
                        <td><?php echo $bike_rent[0]->start_time?></td>
                    </tr>
                    <tr>
                        <td>订单完成时间</td>
                        <td><?php echo $bike_rent[0]->finish_time?></td>
                    </tr>
                    <tr>
                        <td>费用</td>
                        <td>￥ <?php echo $bike_rent[0]->cost?></td>
                    </tr>
                    <tr>
                        <td>操作员帐号</td>
                        <td><?php echo $bike_rent[0]->operate_by?></td>
                    </tr>
                    <tr>
                        <td>操作员名称</td>
                        <td><?php echo $admin[0]->name?></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- /widget-content -->

    </div> <!-- /widget -->


</div> <!-- /container -->

</div> <!-- /content -->