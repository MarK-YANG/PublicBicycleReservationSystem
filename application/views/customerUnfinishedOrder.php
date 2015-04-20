<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/25/15
 * Time: 12:13 AM
 */
?>
<div class="span9">

    <h1 class="page-title">
        <i class="icon-th-large"></i>
        未完成订单
    </h1>

    <?php if(count($bike_book) == 0 && count($parkingspace_book) == 0) {?>

    <div class="row">
        <div class="span9">
            <div class="widget">
                <div class="widget-header">
                    <i class="icon-check"></i>
                    <h3 style="color: green">没有未完成的预约订单</h3>
                </div>
            </div>
        </div>
    </div>

    <?php }?>

    <?php if(count($bike_book) != 0) {?>
    <div class="row">

        <div class="span9">

            <div class="widget widget-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>未完成自行车预约订单</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>订单编号</th>
                            <th>帐户名称</th>
                            <th>客户姓名</th>
                            <th>预约服务站</th>
                            <th>预约时间</th>
                            <th>剩余时间</th>
                            <th>撤消</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td><?php echo $bike_book[0]->id?></td>
                            <td><?php echo $customer[0]->customer_id?></td>
                            <td><?php echo $customer[0]->name?></td>
                            <td><?php echo $bikeBookStation[0]->station_name?></td>
                            <td><?php echo $bike_book[0]->start_time?></td>
                            <td style="color: orange"><?php $start = strtotime($bike_book[0]->start_time);
                                $time = date('Y-m-d G:i:s',time());
                                $end = strtotime($time);
                                $left = 35 - floor(($end - $start)/60);
                                echo $left."分钟"?></td>
                            <td class="action-td">
                                <a href="index.php/customerUnfinishedOrder/bikeBookCancel/<?php echo $bike_book[0]->id?>" class="btn btn-small btn-danger">
                                    <i class="icon-remove"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <?php }?>

    <?php if(count($parkingspace_book) != 0) {?>

    <div class="row">

        <div class="span9">

            <div class="widget widget-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>未完成自行车停车位预约订单</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>订单编号</th>
                            <th>帐户名称</th>
                            <th>客户姓名</th>
                            <th>预约服务站</th>
                            <th>预约时间</th>
                            <th>剩余时间</th>
                            <th>撤消</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td><?php echo $parkingspace_book[0]->id?></td>
                            <td><?php echo $customer[0]->customer_id?></td>
                            <td><?php echo $customer[0]->name?></td>
                            <td><?php echo $parkingspaceBookStation[0]->station_name?></td>
                            <td><?php echo $parkingspace_book[0]->start_time?></td>
                            <td style="color: orange"><?php $start = strtotime($parkingspace_book[0]->start_time);
                                $time = date('Y-m-d G:i:s',time());
                                $end = strtotime($time);
                                $left = 35 - floor(($end - $start)/60);
                                echo $left."分钟"?></td>
                            <td class="action-td">
                                <a href="index.php/customerUnfinishedOrder/parkingspaceBookCancel/<?php echo $parkingspace_book[0]->id?>" class="btn btn-small btn-danger">
                                    <i class="icon-remove"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->
    <?php }?>

</div> <!-- /span9 -->


</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /content -->