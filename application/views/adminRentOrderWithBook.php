<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 4:51 PM
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
                    <i class="icon-download-alt"></i>
                    <h3 style="color: green">查到该用户的预约停车位订单</h3>
                </div> <!-- /widget-header -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>查询结果</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>订单编号</td>
                            <td><?php echo $parkingspace_book[0]->id?></td>
                        </tr>
                        <tr>
                            <td>帐户名称</td>
                            <td><?php echo $parkingspace_book[0]->customer_id?></td>
                        </tr>
                        <tr>
                            <td>客户姓名</td>
                            <td><?php echo $customer[0]->name?></td>
                        </tr>
                        <tr>
                            <td>预约服务站</td>
                            <td><?php echo $station[0]->station_name?></td>
                        </tr>
                        <tr>
                            <td>创建时间</td>
                            <td><?php echo $parkingspace_book[0]->start_time?></td>
                        </tr>
                        </tbody>
                    </table>

                    <h3>**请仔细核实是否为当前服务站**</h3>
                    <br>

                    <form id="continue" class="" action="" method="post"/>

                    <fieldset>

                        <div class="controls">
                            <a href="index.php/adminRentOrder/orderFinishWithBook/<?php echo $bike_rent?>/<?php echo $parkingspace_book[0]->id?>" class="btn btn-success">继续</a>
                        </div>
                        <!-- /controls -->

                    </fieldset>
                    </form>
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