<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 8:12 PM
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
                    <i class="icon-question-sign"></i>
                    <h3 style="color: orange">未查到该用户的预约停车位订单</h3>
                </div> <!-- /widget-header -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-th-list"></i>
                    <h3>选择当前服务站</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form id="change-password" class="form-horizontal" action="index.php/adminRentOrder/stationSearch" method="post" />

                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="selectStation">请选择一个服务站：</label>
                            <div class="controls">
                                <select class="input" id="selectStation" name="selectStation">
                                    <?php foreach($allStations as $row):?>
                                        <option value="<?php echo $row->station_id?>"><?php echo $row->station_name?></option>
                                    <?php endforeach;?>
                                </select>
                                &emsp;&emsp;
                                <button type="submit" class="btn btn-warning">查询</button>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </fieldset>
                    </form>

                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-check"></i>
                    <h3 style="color: <?php echo $color ?>"><?php echo $hint?></h3>
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
                            <td>服务站编号</td>
                            <td><?php echo $station[0]->station_id?></td>
                        </tr>
                        <tr>
                            <td>服务站名称</td>
                            <td><?php echo $station[0]->station_name?></td>
                        </tr>
                        <tr>
                            <td>服务站地址</td>
                            <td><?php echo $station[0]->station_address?></td>
                        </tr>
                        <tr>
                            <td>服务站电话</td>
                            <td><?php echo $station[0]->station_phone_number?></td>
                        </tr>
                        <tr>
                            <td>可用停车位数量</td>
                            <td style="color: <?php echo $color?>"><?php echo $count?></td>
                        </tr>
                        </tbody>
                    </table>

                    <form id="continue" class="" action="" method="post"/>

                    <fieldset>
                        <?php if($count > 0){?>
                        <div class="controls">
                            <a href="index.php/adminRentOrder/orderFinishWithoutBook/<?php echo $bike_rent?>" class="btn btn-success">继续</a>
                        </div>
                        <?php }?>
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