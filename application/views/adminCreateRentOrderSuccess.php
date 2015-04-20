<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:48 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-th-large"></i>
        完成预约订单
    </h1>

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-pencil"></i>
                    <h3 style="color: orange">新的租车订单</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>订单编号</td>
                            <td><?php echo $bike_rent['id']?></td>
                        </tr>
                        <tr>
                            <td>帐户名称</td>
                            <td><?php echo $bike_rent['customer_id']?></td>
                        </tr>
                        <tr>
                            <td>客户姓名</td>
                            <td><?php echo $customer[0]->name?></td>
                        </tr>
                        <tr>
                            <td>租车服务站</td>
                            <td><?php echo $station[0]->station_name?></td>
                        </tr>
                        <tr>
                            <td>租车时间</td>
                            <td><?php echo $bike_rent['start_time']?></td>
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