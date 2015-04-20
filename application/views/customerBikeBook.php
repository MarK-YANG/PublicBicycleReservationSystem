<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/24/15
 * Time: 10:46 AM
 */
?>
<script src="assets/ajax/bikeBookStationInfo.js"></script>

            <div class="span9">

                <h1 class="page-title">
                    <i class="icon-th-large"></i>
                    预约公共自行车
                </h1>

                <div class="row">
                    <div class="span9">
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-th-list"></i>
                                <h3>选择服务站</h3>
                            </div>

                            <div class="widget-content">
                                <form id="change-password" class="form-horizontal" action="index.php/customerBikeBook" method="post" />

                                <fieldset>

                                    <!--selectInfo(this.value, php echo $customer[0]->customer_id?>)-->

                                    <div class="control-group">
                                        <label class="control-label" for="selectStation">请选择一个服务站：</label>
                                        <div class="controls">
                                            <select class="input" id="selectStation" name="stationId" onchange="selectInfo(this.value,'<?php echo $customer[0]->customer_id?>')">
                                                <option>请选择一个服务站</option>
                                                <?php foreach($station as $row):?>
                                                    <option value ="<?php echo $row->station_id?>"><?php echo $row->station_name?></option>
                                                <?php endforeach;?>
                                            </select>
                                            &emsp;&emsp;
                                            <!--<button type="submit" class="btn btn-warning">查询</button>-->

                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo $hint?>

                <div class="row">
                    <div class="span9">
                        <div class="widget">

                            <div class="widget-header">
                                <i class="icon-th-list"></i>
                                <h3>查询结果</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">


                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>服务站名称</th>
                                        <th>服务站地址</th>
                                        <th>服务站电话</th>
                                        <th style="color: orange">可用自行车数量</th>
                                        <th>可用停车位数量</th>
                                        <th>预约</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>

<!--                                        <td>--><?php //echo $search['stationName']?><!--</td>-->
<!--                                        <td>--><?php //echo $search['stationAddress']?><!--</td>-->
<!--                                        <td>--><?php //echo $search['stationPhoneNum']?><!--</td>-->
<!--                                        --><?php //if($search['bikeCount'] > 10){echo "<td style=\"color: green\">".$search['bikeCount']."</td>";}
//                                        elseif($search['bikeCount'] <= 10 && $search['bikeCount']> 0){echo "<td style=\"color: orange\">".$search['bikeCount']."</td>";}
//                                        elseif($search['bikeCount'] == 0){echo "<td style=\"color: red\">".$search['bikeCount']."</td>";}?>
<!--                                        <td>--><?php //echo $search['parkingspaceCount']?><!--</td>-->
<!--                                        <td class="action-td">-->
<!--                                            --><?php
//                                        if($search['canReserve'] == 1){?>
<!--                                                <a href="index.php/customerBikeBook/bikeBook/--><?php //echo $search['stationId']?><!--" class="btn btn-small btn-success">-->
<!--                                                    <i class="icon-ok"></i>-->
<!--                                                </a>-->
<!--                                            --><?php //}else{?>
<!--                                                <a class="btn btn-small">-->
<!--                                                    <i class="icon-remove"></i>-->
<!--                                                </a>-->
<!--                                            --><?php //}
//                                        ?>
<!--                                        </td>-->

                                        <td id="selectName"></td>
                                        <td id="selectAddress"></td>
                                        <td id="selectPhoneNum"></td>
                                        <td id="selectBikeNum"></td>
                                        <td id="selectParkingspaceNum"></td>
                                        <td id="reservation" class="action-td"></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->
                    </div>
                </div>








            </div> <!-- /span9 -->


        </div> <!-- /row -->

    </div> <!-- /container -->

</div> <!-- /content -->
