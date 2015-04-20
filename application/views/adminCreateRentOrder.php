<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:01 PM
 */
?>

<script src="assets/ajax/createRentOrder.js"></script>

<div class="span9">

    <h1 class="page-title">
        <i class="icon-th-large"></i>
        创建租车订单
    </h1>

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-check"></i>
                    <h3 style="color: <?php echo $color?>"><?php echo $hint?></h3>
                </div> <!-- /widget-header -->
            </div> <!-- /widget -->

        </div> <!-- /span9 -->

    </div> <!-- /row -->

    <div class="row">

        <div class="span9">

            <div class="widget">

                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>查询结果</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <td>服务站编号</td>
                            <!--                            <td>--><?php //echo $station[0]->station_id?><!--</td>-->
                            <td id="rStationId"></td>
                        </tr>
                        <tr>
                            <td>服务站名称</td>
                            <!--                            <td>--><?php //echo $station[0]->station_name?><!--</td>-->
                            <td id="rStationName"></td>
                        </tr>
                        <tr>
                            <td>服务站地址</td>
                            <!--                            <td>--><?php //echo $station[0]->station_address?><!--</td>-->
                            <td id="rStationAddress"></td>
                        </tr>
                        <tr>
                            <td>服务站电话</td>
                            <!--                            <td>--><?php //echo $station[0]->station_phone_number?><!--</td>-->
                            <td id="rStationPhoneNum"></td>
                        </tr>
                        <tr>
                            <td style="color orange;">可用自行车数量</td>
                            <!--                            <td style="color: --><?php //echo $color?><!--">--><?php //echo $count?><!--</td>-->
                            <td id="rBikeCount"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
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

                    <form id="change-password" class="form-horizontal" action="index.php/adminCreateRentOrder" method="post" />

                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="selectStation">请选择一个服务站：</label>
                            <div class="controls">
                                <select class="input" id="selectStation" name="station" onchange="selectInfo(this.value)">
                                    <option>请选择一个服务站</option>
                                    <?php foreach($allStations as $row):?>
                                        <option value="<?php echo $row->station_id?>"><?php echo $row->station_name?></option>
                                    <?php endforeach?>
                                </select>
<!--                                &emsp;&emsp;-->
<!--                                <button type="submit" class="btn btn-warning">查询</button>-->
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->


                        <div class="control-group">
                            <?php if($count > 0){?>
                            <label class="control-label" for="selectStation">用户名：</label>
                            <div class="controls">
                                <input type="text" name="customerId" value="<?php echo set_value('customerId');?>">
                                &emsp;&emsp;
                                <button type="submit" class="btn btn-success">继续</button>
                                <p class="help-block" style="color: red"><?php echo validation_errors(' ',' ');?></p>
                            </div> <!-- /controls -->
                            <?php }?>

                        </div> <!-- /control-group -->

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