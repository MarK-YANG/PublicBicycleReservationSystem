<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/23/15
 * Time: 8:07 PM
 */
?>

            <div class="span9">

                <h1 class="page-title">
                    <i class="icon-th-list"></i>
                    服务站状况总览
                </h1>

                <div class="row">

                    <div class="span9">

                        <div class="widget widget-table">

                            <div class="widget-header">
                                <i class="icon-th-list"></i>
                                <h3>基本信息</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">

                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>服务站名称</th>
                                        <th>服务站地址</th>
                                        <th>服务站电话</th>
                                        <th>可用自行车数量</th>
                                        <th>可用停车位数量</th>
                                        <th>预约状态</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $iCount = 0;?>
                                    <?php foreach($station as $row): ?>
                                    <tr>

                                        <td><?php echo $row->station_name?></td>
                                        <td><?php echo $row->station_address?></td>
                                        <td><?php echo $row->station_phone_number?></td>
                                        <?php if($bike[$iCount] <= 10 && $bike[$iCount] >=5){echo "<td style=\"color: orange\">".$bike[$iCount];}
                                        elseif($bike[$iCount] < 5 && $bike[$iCount] >= 0){echo "<td style=\"color: red\">".$bike[$iCount];}
                                        elseif($bike[$iCount] > 10){echo "<td style=\"color: green\">".$bike[$iCount];}?>
                                        <?php if($parkingspace[$iCount] <= 10 && $parkingspace[$iCount] >=5){echo "<td style=\"color: orange\">".$parkingspace[$iCount];}
                                        elseif($parkingspace[$iCount] < 5 && $parkingspace[$iCount] >= 0){echo "<td style=\"color: red\">".$parkingspace[$iCount];}
                                        elseif($parkingspace[$iCount] > 10){echo "<td style=\"color: green\">".$parkingspace[$iCount];}?>
                                        <td class="action-td">
                                            <a href="javascript:;" class="btn btn-small <?php if($parkingspace[$iCount] != 0 && $bike[$iCount] != 0){
                                                echo "btn-success";
                                            }?>">
                                                <i class="icon-ok"></i>
                                            </a>
                                        </td>
                                        <?php $iCount++;?>
                                    </tr>
                                    <?php endforeach; ?>
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



