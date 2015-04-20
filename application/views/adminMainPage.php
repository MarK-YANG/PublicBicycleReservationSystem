<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:04 AM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-home"></i>
        首页
    </h1>

    <div class="stat-container">

        <div class="stat-holder">
            <div class="stat">
                <span><?php echo $bike_book ?></span>
                未完成预约订单
            </div> <!-- /stat -->
        </div> <!-- /stat-holder -->

        <div class="stat-holder">
            <div class="stat">
                <span><?php echo $bike_rent ?></span>
                未完成租车订单
            </div> <!-- /stat -->
        </div> <!-- /stat-holder -->

        <div class="stat-holder">
            <div class="stat">
                <span><?php echo $error_order ?></span>
                超时订单
            </div> <!-- /stat -->
        </div> <!-- /stat-holder -->

        <!-- /stat-holder -->

    </div> <!-- /stat-container -->


    <div class="widget widget-table">

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>服务站信息</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>服务站编号</th>
                    <th>服务站名称</th>
                    <th>服务站地址</th>
                    <th>服务站电话</th>
                    <th>空闲自行车</th>
                    <th>空闲停车位</th>
                </tr>
                </thead>

                <tbody>
                <?php $iCount = 0;?>
                <?php foreach($station as $row): ?>
                    <tr>
                        <td><?php echo $row->station_id?></td>
                        <td><?php echo $row->station_name?></td>
                        <td><?php echo $row->station_address?></td>
                        <td><?php echo $row->station_phone_number?></td>
                        <?php if($bike[$iCount] <= 10 && $bike[$iCount] >=5){echo "<td style=\"color: orange\">".$bike[$iCount];}
                        elseif($bike[$iCount] < 5 && $bike[$iCount] >= 0){echo "<td style=\"color: red\">".$bike[$iCount];}
                        elseif($bike[$iCount] > 10){echo "<td style=\"color: green\">".$bike[$iCount];}?>
                        <?php if($parkingspace[$iCount] <= 10 && $parkingspace[$iCount] >=5){echo "<td style=\"color: orange\">".$parkingspace[$iCount];}
                        elseif($parkingspace[$iCount] < 5 && $parkingspace[$iCount] >= 0){echo "<td style=\"color: red\">".$parkingspace[$iCount];}
                        elseif($parkingspace[$iCount] > 10){echo "<td style=\"color: green\">".$parkingspace[$iCount];}?>
                        <?php $iCount++;?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->


</div> <!-- /container -->

</div> <!-- /content -->