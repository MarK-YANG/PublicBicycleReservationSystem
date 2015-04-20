<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 9:29 PM
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
                <?php if($bike_book[0]->finish_time != "null" && $bike_book[0]->finish_time != "1999-01-01 00:00:00"
                && $bike_book[0]->finish_time != "2000-01-01 00:00:00"){?>
                <tr>
                    <td>帐号名称</td>
                    <td><?php echo $customer[0]->customer_id?></td>
                </tr>
                <tr>
                    <td>客户姓名</td>
                    <td><?php echo $customer[0]->name?></td>
                </tr>
                <tr>
                    <td>预约服务站编号</td>
                    <td><?php echo $station[0]->station_id?></td>
                </tr>
                <tr>
                    <td>预约服务站</td>
                    <td><?php echo $station[0]->station_name?></td>
                </tr>
                <tr>
                    <td>预约自行车编号</td>
                    <td><?php echo $bike_book[0]->bike_id?></td>
                </tr>
                <tr>
                    <td>所占停车位编号</td>
                    <td><?php echo $bike_book[0]->parkingspace_id?></td>
                </tr>
                <tr>
                    <td>创建订单结束时间</td>
                    <td><?php echo $bike_book[0]->start_time?></td>
                </tr>
                <tr>
                    <td>订单完成时间</td>
                    <td><?php echo $bike_book[0]->finish_time?></td>
                </tr>
                <tr>
                    <td>操作员帐号</td>
                    <td><?php echo $bike_book[0]->operate_by?></td>
                </tr>
                    <tr>
                        <td>操作员名称</td>
                        <td><?php echo $admin[0]->name ?></td>
                    </tr>
                <tr>
                    <td>订单状态</td>
                    <td style="color: green">已完成</td>
                </tr>
                <?php }elseif($bike_book[0]->finish_time == "null"){?>
                    <tr>
                        <td>帐号名称</td>
                        <td><?php echo $customer[0]->customer_id?></td>
                    </tr>
                    <tr>
                        <td>客户姓名</td>
                        <td><?php echo $customer[0]->name?></td>
                    </tr>
                    <tr>
                        <td>预约服务站编号</td>
                        <td><?php echo $station[0]->station_id?></td>
                    </tr>
                    <tr>
                        <td>预约服务站</td>
                        <td><?php echo $station[0]->station_name?></td>
                    </tr>
                    <tr>
                        <td>预约自行车编号</td>
                        <td><?php echo $bike_book[0]->bike_id?></td>
                    </tr>
                    <tr>
                        <td>所占停车位编号</td>
                        <td><?php echo $bike_book[0]->parkingspace_id?></td>
                    </tr>
                    <tr>
                        <td>创建订单结束时间</td>
                        <td><?php echo $bike_book[0]->start_time?></td>
                    </tr>
                    <tr>
                        <td>订单状态</td>
                        <td style="color: orange">未完成</td>
                    </tr>
                <?php }elseif($bike_book[0]->finish_time == "2000-01-01 00:00:00"){?>
                    <tr>
                        <td>帐号名称</td>
                        <td><?php echo $customer[0]->customer_id?></td>
                    </tr>
                    <tr>
                        <td>客户姓名</td>
                        <td><?php echo $customer[0]->name?></td>
                    </tr>
                    <tr>
                        <td>预约服务站编号</td>
                        <td><?php echo $station[0]->station_id?></td>
                    </tr>
                    <tr>
                        <td>预约服务站</td>
                        <td><?php echo $station[0]->station_name?></td>
                    </tr>
                    <tr>
                        <td>预约自行车编号</td>
                        <td><?php echo $bike_book[0]->bike_id?></td>
                    </tr>
                    <tr>
                        <td>所占停车位编号</td>
                        <td><?php echo $bike_book[0]->parkingspace_id?></td>
                    </tr>
                    <tr>
                        <td>创建订单结束时间</td>
                        <td><?php echo $bike_book[0]->start_time?></td>
                    </tr>
                    <tr>
                        <td>订单状态</td>
                        <td style="color: deepskyblue">客户取消</td>
                    </tr>
                <?php }elseif($bike_book[0]->finish_time == "1999-01-01 00:00:00"){?>
                    <tr>
                        <td>帐号名称</td>
                        <td><?php echo $customer[0]->customer_id?></td>
                    </tr>
                    <tr>
                        <td>客户姓名</td>
                        <td><?php echo $customer[0]->name?></td>
                    </tr>
                    <tr>
                        <td>预约服务站编号</td>
                        <td><?php echo $station[0]->station_id?></td>
                    </tr>
                    <tr>
                        <td>预约服务站</td>
                        <td><?php echo $station[0]->station_name?></td>
                    </tr>
                    <tr>
                        <td>预约自行车编号</td>
                        <td><?php echo $bike_book[0]->bike_id?></td>
                    </tr>
                    <tr>
                        <td>所占停车位编号</td>
                        <td><?php echo $bike_book[0]->parkingspace_id?></td>
                    </tr>
                    <tr>
                        <td>创建订单时间</td>
                        <td><?php echo $bike_book[0]->start_time?></td>
                    </tr>
                    <tr>
                        <td>订单状态</td>
                        <td style="color: red">超时订单</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

        </div>
        <!-- /widget-content -->

    </div> <!-- /widget -->


</div> <!-- /container -->

</div> <!-- /content -->

