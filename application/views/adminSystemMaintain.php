<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/9/15
 * Time: 12:00 PM
 */
?>

<script src="assets/ajax/systemMaintain.js"></script>



<div class="span9">

    <h1 class="page-title">
        <i class="icon-comments"></i>
        系统维护
    </h1>

    <div class="widget">

        <div class="widget-header">
            <i class="icon-cog"></i>
            <h3>服务站维护</h3>
        </div>

        <div class="widget-content">

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li <?php echo $tabActive[0]?>><a href="#1" data-toggle="tab">新增管理员帐户</a></li>
                    <li <?php echo $tabActive[1]?>><a href="#2" data-toggle="tab">服务站信息维护</a> </li>
                    <li <?php echo $tabActive[2]?>><a href="#3" data-toggle="tab">新增服务站</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane <?php echo $tabActiveP[0]?>" id="1">
                        <form id="change-password" class="form-horizontal" action="<?php  base_url()?>index.php/adminSystemMaintain/addAdmin" method="post" />

                        <fieldset>

                            <div class="control-group">
                                <div class="controls">
                                    <p class="help-block" style="color: green"><?php echo $addAdmin['hint'];?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="adminId">管理员ID：</label>
                                <div class="controls">
                                    <input type="text" class="input-medium" name="adminId" id="adminId" value="<?php echo set_value('adminId'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('adminId',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="name">管理员名称：</label>
                                <div class="controls">
                                    <input type="text" class="input-medium" name="name" id="name" value="<?php echo set_value('name'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('name',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="Password">密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-medium" name="password" id="Password" value="<?php echo set_value('password'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('password',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="rePassword">确认密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-medium" name="rePassword" id="rePassword" value="<?php echo set_value('rePassword'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('rePassword',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="previledge">权限等级：</label>
                                <div class="controls">
                                    <input type="text" class="input-medium" name="privilege" id="privilege" value="<?php echo set_value('privilege'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('privilege',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="controls">
                                <br>
                                <button type="submit" class="btn btn-success">保存</button> <button type="reset" class="btn">取消</button>
                            </div>

                        </fieldset>

                        </form>
                    </div>

                    <div class="tab-pane <?php echo $tabActiveP[1]?>" id="2">
                        <form class="form-horizontal" action="index.php/adminSystemMaintain/stationSearch" method="post" />

                        <fieldset>

                            <div class="control-group">
                                <div class="controls">
                                    <p class="help-block"><?php echo $modifyStation['hint'];?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label" for="selectStation">请选择一个服务站：</label>
                                <div class="controls">
                                    <select class="input" id="selectStation" name="modifyStationId" onchange="selectInfo(this.value)">
                                        <option>请选择一个服务站</option>
                                        <?php foreach($allStation as $row):?>
                                            <option value ="<?php echo $row->station_id?>"><?php echo $row->station_name?></option>
                                        <?php endforeach;?>
                                    </select>
<!--                                    &emsp;&emsp;-->
<!--                                    <button type="submit" class="btn btn-warning">查询</button>-->
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->
                        </fieldset>
                        </form>

                        <form class="form-horizontal" action="index.php/adminSystemMaintain/modifyStation" method="post" />

                        <fieldset>

                            <div class="control-group">
                                <label class="control-label">服务站编号：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="mStationId" name="stationId" value="<?php echo $modifyStation['station_id'];?>" readonly="true"/>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站名称：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="mStationName" name="stationName" value="<?php echo $modifyStation['station_name'];?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationName',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站地址：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="mStationAddress" name="stationAddress" value="<?php echo $modifyStation['station_address'];?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationAddress',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站电话：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="mStationPhoneNum" name="stationPhoneNum" value="<?php echo $modifyStation['station_phone_number'];?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationPhoneNum',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="controls">
                                <br>
                                <button type="submit" class="btn btn-success">保存</button>&emsp;
                                <a href="index.php/adminSystemMaintain/deleteStation/<?php if($modifyStation['station_id'] == ""){echo -1;}else{echo $modifyStation['station_id'];};?>" class="btn btn-danger">删除</a>&emsp;
                                <button type="reset" class="btn">取消</button>
                            </div>

                        </fieldset>
                        </form>
                    </div>

                    <div class="tab-pane <?php echo $tabActiveP[2]?>" id="3">

                        <form class="form-horizontal" action="index.php/adminSystemMaintain/addStation" method="post" />

                        <fieldset>

                            <div class="control-group">
                                <div class="controls">
                                    <p class="help-block"><?php echo $addStation['hint'];?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站编号：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" name="aStationId" value="<?php echo set_value('aStationId'); ?>"/>
                                    <p class="help-block" style="color: red"><?php echo form_error('stationId',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站名称：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" name="aStationName" value="<?php echo set_value('aStationName'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationName', ' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站地址：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" name="aStationAddress" value="<?php echo set_value('aStationAddress'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationAddress',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="control-group">
                                <label class="control-label">服务站电话：</label>
                                <div class="controls">
                                    <input type="text" class="input-large" name="aStationPhoneNum" value="<?php echo set_value('aStationPhoneNum'); ?>" />
                                    <p class="help-block" style="color: red"><?php echo form_error('stationPhoneNum',' ',' ');?></p>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                            <div class="controls">
                                <br>
                                <button type="submit" class="btn btn-success">保存</button> <button type="reset" class="btn">取消</button>
                            </div>

                        </fieldset>
                        </form>
                    </div>



                </div>

            </div>
        </div>

    </div>

</div> <!-- /container -->

</div> <!-- /content -->
