<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/25/15
 * Time: 1:07 AM
 */
?>



<div class="span9">

    <h1 class="page-title">
        <i class="icon-book"></i>
        历史订单
    </h1>

    <?php if(count($bike_book) == 0 && count($parkingspace_book) == 0 && count($bike_rent) == 0) {?>

        <div class="row">
            <div class="span9">
                <div class="widget">
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3 style="color: green">没有历史订单，欢迎使用公共自行车预约服务系统</h3>
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
                    <h3>历史自行车预约订单</h3>
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
                            <th>完成时间</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($bike_book as $row):?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['customer_id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['station_name']?></td>
                            <td><?php echo $row['start_time']?></td>
                            <td><?php echo $row['finish_time']?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <?php }?>

    <?php if(count($parkingspace_book) != 0){ ?>

    <div class="row">

        <div class="span9">

            <div class="widget widget-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>历史自行车停车位预约订单</h3>
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
                            <th>完成时间</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($parkingspace_book as $row):?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['customer_id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['station_name']?></td>
                                <td><?php echo $row['start_time']?></td>
                                <td><?php echo $row['finish_time']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <?php }?>

    <?php if(count($bike_rent) != 0){ ?>

    <div class="row">

        <div class="span9">

            <div class="widget widget-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>历史租车订单</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>订单编号</th>
                            <th>帐户名称</th>
                            <th>客户姓名</th>
                            <th>租车服务站</th>
                            <th>归还服务站</th>
                            <th>租车时间</th>
                            <th>归还时间</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($bike_rent as $row):?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['customer_id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['rent_station_name']?></td>
                                <td><?php echo $row['return_station_name']?></td>
                                <td><?php echo $row['start_time']?></td>
                                <td><?php echo $row['finish_time']?></td>
                            </tr>
                        <?php endforeach;?>
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