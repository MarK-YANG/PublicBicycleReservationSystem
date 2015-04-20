<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/24/15
 * Time: 10:13 PM
 */
?>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-th-large"></i>
        预约自行车成功
    </h1>

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-check"></i>
                    <h3 style="color: orange">注意: 请在35分钟内到指定服务站完成本次订单，超时系统将取消本次订单并记录您的违约</h3>
                </div> <!-- /widget-header -->
            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->


    <div class="row">

        <div class="span9">

            <div class="widget widget-table">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>订单详情</h3>
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
                            <th>撤消</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td><?php echo $bikeBook['id'];?></td>
                            <td><?php echo $customer[0]->customer_id;?></td>
                            <td><?php echo $customer[0]->name;?></td>
                            <td><?php echo $station[0]->station_name;?></td>
                            <td><?php echo $bikeBook['start_time'];?></td>
                            <td class="action-td">
                                <a href="index.php/customerBikeBook/bikeBookCancel/<?php echo $bikeBook['id'];?>" class="btn btn-small btn-danger">
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

</div> <!-- /span9 -->


</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /content -->